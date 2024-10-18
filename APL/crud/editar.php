<?php
include 'db.php';

$id = $_GET['id'];
$query = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$query->bindParam(':id', $id);
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("Usuario no encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    // Actualizar el usuario en la base de datos
    $stmt = $pdo->prepare("UPDATE users SET nombre = :nombre, email = :email WHERE id = :id");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Redireccionar de vuelta a la página principal
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>

<body>
    <h1>Editar Usuario</h1>

    <form action="" method="POST">
        <input type="text" name="nombre" value="<?= $user['nombre'] ?>" required>
        <input type="email" name="email" value="<?= $user['email'] ?>" required>
        <button type="submit">Actualizar</button>
    </form>

    <a href="index.php">Volver</a>
</body>

</html>