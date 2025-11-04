<?php
include('../php/conexion.php');
$categoria = 'Aventura'; // Cambiar según la página
$sql = "SELECT nombre_des, país, descripción, precio_base, categoría FROM destinos WHERE categoría = '$categoria'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Planes de <?= $categoria ?></title>
  <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
  <header>
    <div class="header-top">
      <img src="../image/Logo.png" alt="Logo GoPlan">
      <h1>Planes de <?= $categoria ?></h1>
    </div>
    <nav>
      <a href="../index.php">Inicio</a>
      <a href="planes_destinos.php">Categorías</a>
      <a href="todos_planes.php">Ver Todos</a>
    </nav>
  </header>

  <section class="planes-container">
    <?php
    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $nombre = strtolower(str_replace(' ', '_', $row['nombre_des']));
        $imagen_jpg = "../image/planes/" . $nombre . ".jpg";
        $imagen_png = "../image/planes/" . $nombre . ".png";
        $imagen = file_exists($imagen_jpg) ? $imagen_jpg : (file_exists($imagen_png) ? $imagen_png : "../image/planes/default.jpg");

        echo "<div class='plan-card'>";
        echo "<img src='$imagen' alt='" . htmlspecialchars($row['nombre_des']) . "' class='plan-img'>";
        echo "<h2>" . htmlspecialchars($row['nombre_des']) . "</h2>";
        echo "<p><strong>País:</strong> " . htmlspecialchars($row['país']) . "</p>";
        echo "<p>" . htmlspecialchars($row['descripción']) . "</p>";
        echo "<p><strong>Precio base:</strong> $" . htmlspecialchars($row['precio_base']) . "</p>";
        echo "</div>";
      }
    } else {
      echo "<p>No hay destinos disponibles en esta categoría.</p>";
    }
    ?>
  </section>

  <div class="volver-inicio">
    <a href="../index.php" class="btn-volver">← Volver al Inicio</a>
  </div>

  <footer>
    <p>© 2025 GoPlan - Todos los derechos reservados</p>
  </footer>
</body>
</html>
