<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>GoPlan - Inicio</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
  <header>
    <div class="header-top">
      <img src="image/Logo.png" alt="GoPlan Logo" class="logo">
      <h1>GoPlan</h1>
    </div>
    <nav>
      <a href="index.php">Inicio</a>
      <a href="pages/planes_destinos.php">Planes y Destinos</a>

      <?php if (isset($_SESSION['rol'])): ?>
        <?php if ($_SESSION['rol'] === 'admin'): ?>
          <a href="pages/registrar_cliente.php">Registrar Cliente</a>
          <a href="pages/planes_cliente.php">Ver Itinerarios</a>
        <?php elseif ($_SESSION['rol'] === 'cliente'): ?>
          <a href="pages/planes_cliente.php">Mis Itinerarios</a>
        <?php endif; ?>
        <a href="php/logout.php">Cerrar Sesión (<?= htmlspecialchars($_SESSION['usuario']) ?>)</a>
      <?php else: ?>
        <a href="pages/login.html">Ingresar</a>
      <?php endif; ?>
    </nav>
  </header>

  <section class="hero">
    <h2>Convierte tus sueños en experiencias inolvidables</h2>
    <p>Con GoPlan, descubre destinos increíbles y vive aventuras únicas.</p>
    <a href="pages/planes_destinos.php" class="btn-principal">Ver Planes</a>
  </section>

  <footer>
    <p>© 2025 GoPlan - Todos los derechos reservados</p>
  </footer>
</body>
</html>
