<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ingreso - GoPlan</title>
  <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
  <header>
    <div class="header-top">
      <h1>Ingreso</h1>
    </div>
    <nav>
      <a href="../index.php">Inicio</a>
    </nav>
  </header>

  <section class="login-section">
    <form action="../php/login.php" method="POST" class="form-login">
      <label>Usuario:</label>
      <input type="text" name="usuario" required>

      <label>Contraseña:</label>
      <input type="password" name="contrasena" required>

      <button type="submit">Ingresar</button>

      <p class="link-registro">
        ¿No tienes cuenta?
        <a href="../pages/registro_usuario.html">Regístrate</a>
      </p>
    </form>
  </section>

  <footer>
    <p>© 2025 GoPlan - Todos los derechos reservados</p>
  </footer>
</body>
</html>
