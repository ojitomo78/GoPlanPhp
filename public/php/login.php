<?php
session_start();
require_once __DIR__ . '/../php/conexion.php';

$usuario = $_POST['usuario'] ?? '';
$contraseña = $_POST['contraseña'] ?? '';

if ($usuario && $contraseña) {
    $sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($contraseña, $user['contraseña'])) {
            $_SESSION['usuario'] = $user['usuario'];
            $_SESSION['rol'] = $user['rol'];

            if ($user['rol'] === 'admin') {
                header("Location: ../pages/registrar_cliente.html");
            } else {
                header("Location: ../pages/planes_cliente.php");
            }
            exit;
        }
    }
    echo "<script>alert('❌ Usuario o contraseña incorrectos'); window.location.href='../pages/login.html';</script>";
}
$conn->close();
?>
