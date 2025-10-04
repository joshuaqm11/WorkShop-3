<?php
require 'conexion.php';

// Recibir datos del formulario
$nombre    = $_POST['nombre'] ?? '';
$apellidos = $_POST['apellidos'] ?? '';
$provincia = $_POST['provincia'] ?? '';
$password  = $_POST['password'] ?? '';

// Encriptar contraseña
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Insertar en la tabla usuarios
$sql = "INSERT INTO usuarios (nombre, apellidos, password, provincia_id) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $nombre, $apellidos, $password_hash, $provincia);

if ($stmt->execute()) {
    // Redirigir a login con cada username
    header("Location: login.php?username=" . urlencode($nombre));
    exit();
} else {
    echo "Error al registrar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
