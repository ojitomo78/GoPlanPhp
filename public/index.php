<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>GoPlan | Agencia de Viajes</title>

  <!-- ICONOS -->
  <link rel="icon" type="image/png" href="image/iconos/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="image/iconos/favicon.svg" />
  <link rel="shortcut icon" href="image/iconos/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="image/iconos/apple-touch-icon.png" />
  <link rel="manifest" href="image/iconos/site.webmanifest" />

  <!-- FUENTES Y ESTILOS -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
  <header>
    <div class="header-top">
      <img src="image/Logo.png" alt="Logo GoPlan">
      <h1>GoPlan Agencia de Viajes</h1>
    </div>

    <nav>
      <a href="index.php">Inicio</a>
      <a href="pages/planes_destinos.php">Planes y Destinos</a>

      <?php if (isset($_SESSION['usuario'])): ?>
        <!-- Si el usuario ha iniciado sesión -->
        <a href="pages/planes_cliente.php">Mis Planes</a>
        <a href="php/cerrar_sesion.php">Cerrar sesión (<?php echo htmlspecialchars($_SESSION['usuario']); ?>)</a>
      <?php else: ?>
        <!-- Si NO hay sesión iniciada -->
        <a href="pages/login.html">Ingreso</a>
      <?php endif; ?>
    </nav>
  </header>

  <section id="sobre-nosotros">
    <h2>Sobre Nosotros</h2>
    <p>En <strong>GoPlan</strong> convertimos tus sueños de viaje en experiencias inolvidables. 
    Ofrecemos asesoría personalizada, los mejores destinos y precios adaptados a tu presupuesto.</p>
  </section>

  <section id="planes">
    <h2>Planes Destacados</h2>

    <div class="plan">
      <h3>Plan Caribe</h3>
      <p>Disfruta del sol, la playa y el mar con nuestro paquete todo incluido en Cartagena o San Andrés.</p>
      <p><strong>Desde $1.200.000</strong></p>
      <img src="image/recursos/caribe.webp" alt="Plan Caribe">
    </div>

    <div class="plan">
      <h3>Plan Aventura</h3>
      <p>Explora la naturaleza y vive experiencias extremas en los mejores parques naturales de Colombia.</p>
      <p><strong>Desde $950.000</strong></p>
      <img src="image/recursos/aventura.jpg" alt="Plan Aventura">
    </div>

    <div class="plan">
      <h3>Plan Internacional</h3>
      <p>Viaja al extranjero y conoce culturas únicas con nuestros planes a Europa y Suramérica.</p>
      <p><strong>Desde $3.500.000</strong></p>
      <img src="image/recursos/corea.jpg" alt="Plan Internacional">
    </div>
  </section>

  <footer>
    <p>© 2025 GoPlan - Todos los derechos reservados | Bogotá, Colombia</p>
  </footer>
</body>
</html>
