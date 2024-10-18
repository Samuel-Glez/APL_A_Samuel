<?php
$host = 'localhost';
$dbname = 'prueba';
$username = 'fsg2';  
$password = 'Allertse88.';

try {
   // Establecer la conexión
$con = mysqli_connect($host, $username, $password, $dbname);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>