<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="/img/finance.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Entrada — Finanzas</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <div class="layout">
    @include('partials.sidebar')
    <main class="main-content">
      <div class="page-card">
        <div class="page-title-row">
          <h1 class="page-title">Registrar Entrada</h1>
          <img src="/img/add.png" alt="Entradas" class="page-icon">
        </div>

        @if($error)
          <div class="alert alert-error">{{ $error }}</div>
        @endif
        @if($success)
          <div class="alert alert-success">{{ $success }}</div>
        @endif

        <form action="/entradas/registrar" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="tipo">Tipo de entrada</label>
            <select id="tipo" name="tipo" required>
              <option value="">-- Selecciona --</option>
              <option value="Sueldo">Sueldo</option>
              <option value="Remesa">Remesa</option>
              <option value="Cheque">Cheque</option>
              <option value="Otro">Otro</option>
            </select>
          </div>
          <div class="form-group">
            <label for="monto">Monto ($)</label>
            <input type="number" id="monto" name="monto" step="0.01" min="0" required>
          </div>
          <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha" required>
          </div>
          <div class="form-group">
            <label for="factura">Factura (foto)</label>
            <input type="file" id="factura" name="factura" accept="image/*">
          </div>
          <div class="form-actions">
            <button type="submit" class="btn-primary">Guardar entrada</button>
            <a href="/dashboard" class="btn-secondary">Cancelar</a>
          </div>
        </form>
      </div>
    </main>
  </div>
</body>
</html>