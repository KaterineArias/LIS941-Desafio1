<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="/img/finance.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Balance — Finanzas</title>
  <link rel="stylesheet" href="/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
</head>
<body>
  <div class="layout">
    @include('partials.sidebar')
    <main class="main-content">

      <div class="export-bar no-print">
        <button onclick="exportarPDF()" class="btn-export">Exportar a PDF</button>
      </div>

      <div id="reporte">

        <div class="reporte-header">
          <div class="page-title-row">
            <h1>Reporte de Balance</h1>
            <img src="/img/balance.png" alt="Balance" class="page-icon">
          </div>
          <p class="reporte-fecha">Generado el {{ now()->format('d/m/Y') }}</p>
        </div>

        <div class="reporte-tablas">

          <div class="reporte-tabla-col">
            <h2 class="tabla-titulo entrada-titulo">Entradas</h2>
            @if($entradas->isEmpty())
              <p class="empty-msg">Sin entradas</p>
            @else
              <table class="tabla">
                <thead>
                  <tr>
                    <th>Tipo</th>
                    <th>Monto</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($entradas as $e)
                    <tr>
                      <td>{{ $e->tipo }}</td>
                      <td>${{ number_format($e->monto, 2) }}</td>
                    </tr>
                  @endforeach
                  <tr class="fila-total">
                    <td>TOTAL</td>
                    <td>${{ number_format($totalEntradas, 2) }}</td>
                  </tr>
                </tbody>
              </table>
            @endif
          </div>

          <div class="reporte-tabla-col">
            <h2 class="tabla-titulo salida-titulo">Salidas</h2>
            @if($salidas->isEmpty())
              <p class="empty-msg">Sin salidas</p>
            @else
              <table class="tabla">
                <thead>
                  <tr>
                    <th>Tipo</th>
                    <th>Monto</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($salidas as $s)
                    <tr>
                      <td>{{ $s->tipo }}</td>
                      <td>${{ number_format($s->monto, 2) }}</td>
                    </tr>
                  @endforeach
                  <tr class="fila-total">
                    <td>TOTAL</td>
                    <td>${{ number_format($totalSalidas, 2) }}</td>
                  </tr>
                </tbody>
              </table>
            @endif
          </div>

        </div>

        <div class="balance-resultante {{ $balance >= 0 ? 'positivo' : 'negativo' }}">
          Balance mensual: ${{ number_format($balance, 2) }}
        </div>

        <div class="grafico-container">
          <h2>Gráfico Entradas vs Salidas</h2>
          <canvas id="graficoPastel" class="grafico-pastel" width="300" height="300"></canvas>
        </div>

        <div class="bottom-actions no-print">
          <a href="/dashboard" class="btn-secondary">← Volver a Inicio</a>
        </div>
      </div>
    </main>
  </div>

  <script>
    const TOTAL_ENTRADAS = {{ $totalEntradas }};
    const TOTAL_SALIDAS  = {{ $totalSalidas }};
  </script>
  <script src="/js/grafico.js"></script>
  <script>
    function exportarPDF() {
      const elemento = document.getElementById('reporte');
      const opciones = {
        margin: 10,
        filename: 'balance_finanzas.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2, useCORS: true },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
      };
      html2pdf().set(opciones).from(elemento).save();
    }
  </script>
</body>
</html>