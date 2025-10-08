<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "yamabiko.proxy.rlwy.net";
$username   = "root";
$password   = "ExNlzRDrivHkvSmhToLKgUJTSLPFklcD";
$database   = "agencia";
$port       = 15157;

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("❌ Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre    = $_POST['nombre'] ?? '';
    $documento = $_POST['documento'] ?? '';
    $telefono  = $_POST['telefono'] ?? '';
    $correo    = $_POST['correo'] ?? '';
    $direccion = $_POST['direccion'] ?? '';

    if (empty($nombre) || empty($documento) || empty($telefono) || empty($correo) || empty($direccion)) {
        die("⚠️ Todos los campos son obligatorios.");
    }

    $stmt = $conn->prepare("INSERT INTO clientes (nombre, documento, telefono, correo, direccion) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $documento, $telefono, $correo, $direccion);

    if ($stmt->execute()) {
        echo "✅ Cliente registrado correctamente.";
    } else {
        echo "❌ Error al registrar cliente: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "⚠️ Acceso no permitido.";
}

$conn->close();
?>
