<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="/img/finance.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver Entradas — Finanzas</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <div class="layout">
    @include('partials.sidebar')
    <main class="main-content">
      <div class="page-card">
        <div class="page-title-row">
          <h1 class="page-title">Entradas registradas</h1>
          <img src="/img/entradas.png" alt="Entradas" class="page-icon">
        </div>

        @if($entradas->isEmpty())
          <p class="empty-msg">No hay entradas registradas aún.</p>
        @else
          <table class="tabla">
            <thead>
              <tr>
                <th>#</th>
                <th>Tipo</th>
                <th>Monto</th>
                <th>Fecha</th>
                <th>Factura</th>
              </tr>
            </thead>
            <tbody>
              @foreach($entradas as $i => $e)
                <tr>
                  <td>{{ $i + 1 }}</td>
                  <td>{{ $e->tipo }}</td>
                  <td>${{ number_format($e->monto, 2) }}</td>
                  <td>{{ \Carbon\Carbon::parse($e->fecha)->format('d/m/Y') }}</td>
                  <td>
                    @if($e->factura_ruta)
                      <img src="/{{ $e->factura_ruta }}" alt="Factura" class="factura-thumb" onclick="abrirModal(this.src)">
                    @else
                      <span class="sin-factura">Sin factura</span>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @endif

        <div class="bottom-actions">
          <a href="/dashboard" class="btn-secondary">← Volver a Inicio</a>
        </div>
      </div>
    </main>
  </div>

  <div id="modal" class="modal" onclick="cerrarModal()">
    <img id="modal-img" src="" alt="Factura completa">
  </div>

  <script>
    function abrirModal(src) {
      document.getElementById('modal-img').src = src;
      document.getElementById('modal').classList.add('active');
    }
    function cerrarModal() {
      document.getElementById('modal').classList.remove('active');
    }
  </script>
</body>
</html>