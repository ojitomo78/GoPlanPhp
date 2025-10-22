<?php
include('conexion.php');

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "INSERT INTO usuarios (usuario, contrasena, rol) VALUES (?, ?, 'cliente')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usuario, $contrasena);

if ($stmt->execute()) {
    echo "<script>alert('Registro exitoso, ahora puedes iniciar sesión');window.location='../pages/login.php';</script>";
} else {
    echo "<script>alert('Error al registrar usuario');window.location='../pages/registro_usuario.html';</script>";
}
?>
