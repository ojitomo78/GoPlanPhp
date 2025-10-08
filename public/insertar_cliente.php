<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set('America/Bogota');

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

    $sql = "INSERT INTO clientes (nombre, documento, telefono, correo, direccion, fecha_res)
            VALUES (?, ?, ?, ?, ?, NOW())";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $documento, $telefono, $correo, $direccion);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Cliente registrado exitosamente'); window.location.href='index.html';</script>";
    } else {
        echo "❌ Error al registrar cliente: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
