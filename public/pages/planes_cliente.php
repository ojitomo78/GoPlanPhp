<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'cliente') {
    header("Location: login.html");
    exit;
}
require_once __DIR__ . '/../php/conexion.php';
$usuario = $_SESSION['usuario'];

$query = "SELECT * FROM itinerarios WHERE cliente = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mis Itinerarios - GoPlan</title>
  <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
  <header>
    <h1>Bienvenido, <?= htmlspecialchars($usuario) ?></h1>
    <nav>
      <a href="../php/logout.php">Cerrar sesión</a>
    </nav>
  </header>

  <section>
    <h2>Tus itinerarios</h2>
    <?php if ($result->num_rows > 0): ?>
      <table>
        <tr><th>Destino</th><th>Actividad</th><th>Fecha</th></tr>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['destino']) ?></td>
            <td><?= htmlspecialchars($row['actividad']) ?></td>
            <td><?= htmlspecialchars($row['fecha']) ?></td>
          </tr>
        <?php endwhile; ?>
      </table>
    <?php else: ?>
      <p>No tienes itinerarios registrados.</p>
    <?php endif; ?>
  </section>
</body>
</html>
