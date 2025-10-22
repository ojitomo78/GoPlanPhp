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
?>