<?php 
// Establecer la conexión
$con = mysqli_connect('localhost', 'fsg2', 'Allertse88.', 'prueba');

//Verificar la conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}


// Consulta SQL para insertar datos
$sql = "UPDATE usuarios set nombre = 'Alex22' WHERE id = 6";

// Ejecutar la consulta y verificar si fue exitosa
if (mysqli_query($con, $sql)) {
    echo "Se ha actualizado exitosamente el usuario";
} else {
    echo "Error al insertar los datos: " . mysqli_error($con);
}

// Cerrar la conexión
mysqli_close($con);

//print_r($con);

?>