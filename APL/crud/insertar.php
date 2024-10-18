<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    // Insertar en la base de datos
    $stmt = $pdo->prepare("INSERT INTO users (nombre, email) VALUES (:nombre, :email)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Redireccionar de vuelta a la página principal
    header("Location: index.php");
    exit;
}
?>