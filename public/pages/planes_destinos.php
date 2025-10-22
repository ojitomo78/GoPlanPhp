<?php
require_once __DIR__ . '/../php/conexion.php';
$result = $conn->query("SELECT nombre, descripcion, precio, imagen FROM destinos");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Destinos - GoPlan</title>
  <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
  <header><h1>Planes y Destinos</h1></header>
  <section>
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="plan">
        <h3><?= htmlspecialchars($row['nombre']) ?></h3>
        <p><?= htmlspecialchars($row['descripcion']) ?></p>
        <p><strong>$<?= htmlspecialchars($row['precio']) ?></strong></p>
        <img src="../image/recursos/<?= htmlspecialchars($row['imagen']) ?>" alt="Destino">
      </div>
    <?php endwhile; ?>
  </section>
</body>
</html>
