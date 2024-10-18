<?php 
// Establecer la conexión
$con = mysqli_connect('localhost', 'fsg2', 'Allertse88.', 'prueba');

// Verificar la conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$nombre = "Samuel";
$email = "samuel.glez@gmail.com";

// Consulta SQL para insertar datos
$sql = "INSERT INTO usuarios (nombre, email) VALUES ('$nombre', '$email')";

// Ejecutar la consulta y verificar si fue exitosa
if (mysqli_query($con, $sql)) {
    echo "Nuevo registro creado exitosamente";
} else {
    echo "Error al insertar los datos: " . mysqli_error($con);
}

// Cerrar la conexión
mysqli_close($con);

//print_r($con);

?>