<?php 
// Establecer la conexión
$con = mysqli_connect('localhost', 'fsg2', 'Allertse88.', 'prueba');

//Verificar la conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}


// Consulta SQL para insertar datos
$sql = "SELECT * from usuarios";

$result = mysqli_query($con, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_NUM);

foreach ($rows as $fila) {
    echo "ID: " . $fila[0] . " - Nombre: " . $fila[1] . " - Email: " . $fila[2] . " - Creado: " . $fila[3] . "<br>";
}


// do {
//     $data[] = $rows;
    
// } while ($rows = mysqli_fetch_all($result, MYSQLI_NUM));


// Cerrar la conexión
mysqli_close($con);

//print_r($rows);

?>