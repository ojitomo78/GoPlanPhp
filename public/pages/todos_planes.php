<?php
include('../php/conexion.php');

$sql = "SELECT nombre_des, país, descripción, precio_base, categoría FROM destinos ORDER BY categoría";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Planes y Destinos</title>
  <link rel="stylesheet" href="../css/estilos.css">
  <style>
    .categoria-titulo {
      font-size: 1.8em;
      color: #ff9800;
      margin: 40px 0 20px;
      text-align: center;
      text-transform: capitalize;
    }

    .plan-card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 12px;
      transition: transform 0.3s ease;
    }

    .plan-card img:hover {
      transform: scale(1.03);
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

    <?php
    if ($result && $result->num_rows > 0) {
      $categoria_actual = "";

      while ($row = $result->fetch_assoc()) {
        // Detectar cambio de categoría
        if ($categoria_actual != $row['categoría']) {
          if ($categoria_actual != "") echo "</div>"; // Cierra grupo anterior
          $categoria_actual = $row['categoría'];
          echo "<h3 class='categoria-titulo'>" . htmlspecialchars($categoria_actual) . "</h3>";
          echo "<div class='planes-container'>";
        }

        $nombre = strtolower(str_replace(' ', '_', $row['nombre_des']));
        $imagen = "../image/planes/" . $nombre . ".png";
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
      echo "</div>"; // Cierra último grupo
    } else {
      echo "<p>No hay destinos disponibles.</p>";
    }
    ?>

    <div class="volver-inicio">
      <a href="../index.php" class="btn-volver">← Volver al Inicio</a>
    </div>
  </section>

  <footer>
    <p>© 2025 GoPlan - Todos los derechos reservados</p>
  </footer>
</body>
</html>
