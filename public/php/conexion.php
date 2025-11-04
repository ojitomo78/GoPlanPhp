<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "gondola.proxy.rlwy.net";
$username   = "root";
$password   = "weCFDPieEwtFuNVxVybFCYhKohMsChux";
$database   = "agencia";
$port       = 16923;

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("❌ Error de conexión: " . $conn->connect_error);
}
?>
