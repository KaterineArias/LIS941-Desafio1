<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="/img/finance.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — Finanzas</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <div class="login-container">
    <div class="login-card">
      <a href="/login">
        <img src="/img/finance.png" alt="Logo" class="login-logo">
      </a>
      <h1>Control de Finanzas</h1>
      <h2>Iniciar Sesión</h2>

      @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
      @endif

      <form action="/login" method="POST">
        @csrf
        <div class="form-group">
          <label for="username">Usuario</label>
          <input type="text" id="username" name="username" required autofocus>
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn-primary">Ingresar</button>
      </form>
    </div>
  </div>
</body>
</html>