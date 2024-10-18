<?php
include 'db.php';

$id = $_GET['id'];

// Consulta SQL para insertar datos
$sql = "DELETE from usuarios WHERE id = $id";

// Ejecutar la consulta y verificar si fue exitosa
if (mysqli_query($con, $sql)) {
    echo "Se ha borrado exitosamente el usuario";
} else {
    echo "Error al insertar los datos: " . mysqli_error($con);
}

// Cerrar la conexión
mysqli_close($con);

// Redireccionar de vuelta a la página principal
header("Location: index.php");
exit;
?>