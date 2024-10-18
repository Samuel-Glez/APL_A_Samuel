<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    $sql = "INSERT INTO usuarios (nombre, email) VALUES ('$nombre', '$email')";

// Ejecutar la consulta y verificar si fue exitosa
if (mysqli_query($con, $sql)) {
    echo "Nuevo registro creado exitosamente";
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