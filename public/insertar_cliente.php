<?php
$servername = getenv("MYSQLHOST");
$username = getenv("MYSQLUSER");
$password = getenv("MYSQLPASSWORD");
$database = getenv("MYSQLDATABASE");
$port = getenv("MYSQLPORT");

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$documento = $_POST['documento'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];

$sql = "INSERT INTO clientes (nombre, documento, telefono, correo, direccion)
        VALUES ('$nombre', '$documento', '$telefono', '$correo', '$direccion')";

if ($conn->query($sql) === TRUE) {
    echo "Cliente registrado correctamente";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
