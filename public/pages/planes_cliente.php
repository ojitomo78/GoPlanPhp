<?php
session_start();
include('../php/conexion.php');

if (!isset($_SESSION['usuario'])) {
  header("Location: login.php");
  exit;
}

$sql = "SELECT * FROM itinerarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Planes del Cliente</title>
  <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
  <header>
    <h1>Planes del Cliente</h1>
  </header>

  <section class="planes-container">
    <?php if ($result && $result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="plan-card">
          <h2><?= htmlspecialchars($row['actividad']) ?></h2>
          <p><strong>Lugar:</strong> <?= htmlspecialchars($row['lugar']) ?></p>
          <p><strong>Horario:</strong> <?= htmlspecialchars($row['horario_act']) ?></p>
          <p><strong>Duración:</strong> <?= htmlspecialchars($row['duracion']) ?></p>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No hay itinerarios disponibles.</p>
    <?php endif; ?>
  </section>

  <div class="volver-inicio">
    <a href="../index.php" class="btn-volver">Volver al inicio</a>
  </div>
</body>
</html>
