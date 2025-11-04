<?php
include('../php/conexion.php');

$sql = "SELECT nombre_des, país, descripción, precio_base, categoría FROM destinos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Planes y Destinos</title>
  <link rel="stylesheet" href="../css/estilos.css">
  <style>
    .plan-card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 12px;
    }
  </style>
</head>
<body>
  <header>
    <div class="header-top">
      <img src="../image/Logo.png" alt="Logo GoPlan">
      <h1>Planes y Destinos</h1>
    </div>
    <nav>
      <a href="../index.php">Inicio</a>
    </nav>
  </header>

  <section id="planes">
    <h2>Explora Nuestros Destinos</h2>

    <div class="planes-container">
      <?php
      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $nombre = strtolower(str_replace(' ', '_', $row['nombre_des']));
          $imagen = "../image/planes/" . $nombre . ".jpg";

          if (!file_exists($imagen)) {
            $imagen = "../image/planes/default.jpg"; // Imagen por defecto
          }

          echo "<div class='plan-card'>";
          echo "<img src='$imagen' alt='Imagen de " . htmlspecialchars($row['nombre_des']) . "'>";
          echo "<h2>" . htmlspecialchars($row['nombre_des']) . "</h2>";
          echo "<p><strong>País:</strong> " . htmlspecialchars($row['país']) . "</p>";
          echo "<p>" . htmlspecialchars($row['descripción']) . "</p>";
          echo "<p><strong>Categoría:</strong> " . htmlspecialchars($row['categoría']) . "</p>";
          echo "<p><strong>Precio base:</strong> $" . htmlspecialchars($row['precio_base']) . "</p>";
          echo "</div>";
        }
      } else {
        echo "<p>No hay destinos disponibles.</p>";
      }
      ?>
    </div>

    <div class="volver-inicio">
      <a href="../index.php" class="btn-volver">← Volver al Inicio</a>
    </div>
  </section>

  <footer>
    <p>© 2025 GoPlan - Todos los derechos reservados</p>
  </footer>
</body>
</html>
