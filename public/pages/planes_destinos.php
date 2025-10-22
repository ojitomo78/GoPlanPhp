<?php
include('../conexion.php');

$sql = "SELECT nombre_des, país, descripción, precio_base, categoría FROM destinos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Planes y Destinos</title>
  <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
  <header>
    <h1>Planes y Destinos</h1>
  </header>

  <section class="planes-container">
    <?php
    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<div class='plan-card'>";
        echo "<h2>" . htmlspecialchars($row['nombre_des']) . "</h2>";
        echo "<p><strong>País:</strong> " . htmlspecialchars($row['país']) . "</p>";
        echo "<p>" . htmlspecialchars($row['descripción']) . "</p>";
        echo "<p><strong>Categoría:</strong> " . htmlspecialchars($row['categoría']) . "</p>";
        echo "<p><strong>Precio base:</strong> $" . htmlspecialchars($row['precio_base']) . "</p>";
        echo "</div>";
      }
    } else {
      ech

