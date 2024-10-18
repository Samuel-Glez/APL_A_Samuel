<?php
include 'db.php';

// Consulta para obtener todos los usuarios
$query = $pdo->query("SELECT * FROM users");
$users = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD con PHP y MySQL</title>
</head>

<body>
    <h1>Lista de Usuarios</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha Creado</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['nombre'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['created'] ?></td>
            <td>
                <a href="editar.php?id=<?= $user['id'] ?>">Editar</a>
                <a href="eliminar.php?id=<?= $user['id'] ?>"
                    onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Agregar Usuario</h2>
    <form action="insertar.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Agregar</button>
    </form>
</body>

</html>