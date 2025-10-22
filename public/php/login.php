<?php
session_start();
include('conexion.php');

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usuario, $contrasena);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $_SESSION['usuario'] = $data['usuario'];
    $_SESSION['rol'] = $data['rol'];

    header("Location: ../index.php");
    exit;
} else {
    echo "<script>alert('Usuario o contraseña incorrectos');window.location='../pages/login.html';</script>";
}
?>
