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
      $currentCategory = null;

      while ($row = $result->fetch_assoc()) {
        // Detectar cambio de categoría
        if ($currentCategory !== $row['categoría']) {
          if ($currentCategory !== null) echo "</div>"; // Cierra grupo anterior
          $currentCategory = $row['categoría'];
          echo "<h3 class='categoria-titulo'>" . htmlspecialchars($currentCategory) . "</h3>";
          echo "<div class='planes-container'>";
        }

        // Asignar imagen según la categoría
        $categoria = strtolower($row['categoría']);
        $imagen = "../image/recursos/default.jpg"; // por defecto

        if (str_contains($categoria, "caribe")) {
          $imagen = "../image/recursos/caribe.webp";
        } elseif (str_contains($categoria, "aventura")) {
          $imagen = "../image/recursos/aventura.jpg";
        } elseif (str_contains($categoria, "internacional")) {
          $imagen = "../image/recursos/corea.jpg";
        }

        echo "<div class='plan-card'>";
        echo "<img src='$imagen' alt='" . htmlspecialchars($row['nombre_des']) . "'>";
        echo "<h2>" . htmlspecialchars($row['nombre_des']) . "</h2>";
        echo "<p><strong>País:</strong> " . htmlspecialchars($row['país']) . "</p>";
        echo "<p>" . htmlspecialchars($row['descripción']) . "</p>";
        echo "<p><strong>Categoría:</strong> " . htmlspecialchars($row['categoría']) . "</p>";
        echo "<p><strong>Precio base:</strong> $" . htmlspecialchars($row['precio_base']) . "</p>";
        echo "</div>";
      }

      echo "</div>"; // Cierra el último grupo
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
