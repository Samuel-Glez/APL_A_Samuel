<?php
include 'db.php';

$id = $_GET['id'];

// Consulta para obtener todos los usuarios
$sql = "SELECT * FROM usuarios WHERE id = $id";

$result = mysqli_query($con, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC); 

if (!$users) {
    die("Usuario no encontrado.");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo CSS -->
    <title>Editar Usuario</title>
</head>

<body>
    <div class="container">
        <!-- Contenedor para centrar el contenido -->
        <h1>Editar Usuario</h1>

        <form action="" method="POST">
            <?php foreach ($users as $user): ?>
            <input type="text" name="nombre" value="<?= $user['nombre'] ?>" required>
            <input type="email" name="email" value="<?= $user['email'] ?>" required>
            <button type="submit">Actualizar</button>
            <?php endforeach; ?>
        </form>

        <a href="index.php">Volver</a> <!-- Enlace estilizado para volver -->
    </div>
</body>

</html>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
     
// Consulta SQL para insertar datos
$sql = "UPDATE usuarios set nombre = '$nombre', email = '$email' WHERE id = $id";

// Ejecutar la consulta y verificar si fue exitosa
if (mysqli_query($con, $sql)) {
    echo "Se ha actualizado exitosamente el usuario";
} else {
    echo "Error al insertar los datos: " . mysqli_error($con);
}

// Cerrar la conexión
mysqli_close($con);

    // Redireccionar de vuelta a la página principal
    header("Location: index.php");
    exit;
}
?>