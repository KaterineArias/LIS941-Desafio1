<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="/img/finance.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ver Salidas — Finanzas</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <div class="layout">
    @include('partials.sidebar')
    <main class="main-content">
      <div class="page-card">
        <div class="page-title-row">
          <h1 class="page-title">Salidas registradas</h1>
          <img src="/img/salidas.png" alt="Salidas" class="page-icon">
        </div>

        @if($salidas->isEmpty())
          <p class="empty-msg">No hay salidas registradas aún.</p>
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
              @foreach($salidas as $i => $s)
                <tr>
                  <td>{{ $i + 1 }}</td>
                  <td>{{ $s->tipo }}</td>
                  <td>${{ number_format($s->monto, 2) }}</td>
                  <td>{{ \Carbon\Carbon::parse($s->fecha)->format('d/m/Y') }}</td>
                  <td>
                    @if($s->factura_ruta)
                      <img src="/{{ $s->factura_ruta }}" alt="Factura" class="factura-thumb" onclick="abrirModal(this.src)">
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