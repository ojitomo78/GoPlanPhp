<?php
session_start();
include('../php/conexion.php');

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $_SESSION['usuario'] = $data['usuario'];
    $_SESSION['rol'] = $data['rol'];

    if ($data['rol'] === 'admin') {
        header("Location: registrar_cliente.php");
    } else {
        header("Location: planes_cliente.php");
    }
} else {
    echo "<script>alert('Usuario o contraseña incorrectos');window.location='login.html';</script>";
}
?>
