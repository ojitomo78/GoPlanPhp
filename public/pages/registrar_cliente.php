<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <link rel="icon" type="image/png" href="image/iconos/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="image/iconos/favicon.svg" />
  <link rel="shortcut icon" href="image/iconos/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="image/iconos/apple-touch-icon.png" />
  <meta name="apple-mobile-web-app-title" content="MyWebSite" />
  <link rel="manifest" href="image/iconos/site.webmanifest" />
  <meta charset="UTF-8">
  <title>Registrar Cliente - GoPlan</title>
  <link rel="stylesheet" href="../css/estilos.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <header>
    <h1>Registro de Cliente - GoPlan</h1>
    <nav>
      <a href="../index.php">Inicio</a>
    </nav>
  </header>

  <div class="container mt-5">
    <h2 class="mb-4 text-center">Registrar Cliente</h2>
    <form action="../php/insertar_cliente.php" method="POST" class="p-4 bg-white rounded shadow-sm">
      <div class="mb-3">
        <label class="form-label">Nombre:</label>
        <input type="text" name="nombre" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Documento:</label>
        <input type="text" name="documento" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Teléfono:</label>
        <input type="text" name="telefono" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Correo:</label>
        <input type="email" name="correo" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Dirección:</label>
        <input type="text" name="direccion" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-warning w-100 text-white fw-bold">Registrar</button>
    </form>
  </div>

  <footer>
    <p>© 2025 GoPlan - Todos los derechos reservados</p>
  </footer>
</body>
</html>
