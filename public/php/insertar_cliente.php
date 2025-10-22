<?php
require_once __DIR__ . '/../php/conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre    = $_POST['nombre'] ?? '';
    $documento = $_POST['documento'] ?? '';
    $telefono  = $_POST['telefono'] ?? '';
    $correo    = $_POST['correo'] ?? '';
    $direccion = $_POST['direccion'] ?? '';

    if (empty($nombre) || empty($documento) || empty($telefono) || empty($correo) || empty($direccion)) {
        die("⚠️ Todos los campos son obligatorios.");
    }

    $fecha_res = date('Y-m-d H:i:s', time() - 5 * 3600);

    $sql = "INSERT INTO clientes (nombre, documento, telefono, correo, direccion, fecha_res)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nombre, $documento, $telefono, $correo, $direccion, $fecha_res);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Cliente registrado exitosamente'); window.location.href='/index.php';</script>";
    } else {
        echo "❌ Error al registrar cliente: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
