<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="/img/finance.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard — Finanzas</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <div class="layout">
    @include('partials.sidebar')
    <main class="main-content">

      <div class="welcome-card">
        <div>
          <h1>Bienvenido, {{ Auth::user()->name }}</h1>
          <p>Resumen general de tus finanzas</p>
        </div>
        <div class="welcome-date">
          {{ now()->locale('es')->isoFormat('dddd, D [de] MMMM [de] YYYY') }}
        </div>
      </div>

      <div class="stats-grid">
        <div class="stat-card stat-entradas">
          <div class="stat-icon">↑</div>
          <div class="stat-info">
            <span class="stat-label">Total Entradas</span>
            <span class="stat-value">${{ number_format($totalEntradas, 2) }}</span>
            <span class="stat-sub">{{ $numEntradas }} registro{{ $numEntradas != 1 ? 's' : '' }}</span>
          </div>
        </div>
        <div class="stat-card stat-salidas">
          <div class="stat-icon">↓</div>
          <div class="stat-info">
            <span class="stat-label">Total Salidas</span>
            <span class="stat-value">${{ number_format($totalSalidas, 2) }}</span>
            <span class="stat-sub">{{ $numSalidas }} registro{{ $numSalidas != 1 ? 's' : '' }}</span>
          </div>
        </div>
        <div class="stat-card {{ $balance >= 0 ? 'stat-balance-pos' : 'stat-balance-neg' }}">
          <div class="stat-icon">{{ $balance >= 0 ? '✓' : '!' }}</div>
          <div class="stat-info">
            <span class="stat-label">Balance</span>
            <span class="stat-value">${{ number_format($balance, 2) }}</span>
            <span class="stat-sub">{{ $balance >= 0 ? 'Positivo' : 'Negativo' }}</span>
          </div>
        </div>
      </div>

      <div class="quick-actions">
        <h2 class="section-title">Accesos rápidos</h2>
        <div class="actions-grid">
          <a href="/entradas/registrar" class="action-card">
            <img src="/img/add.png" alt="Registrar entrada" class="action-img">
            <span>Registrar entrada</span>
          </a>
          <a href="/salidas/registrar" class="action-card">
            <img src="/img/minus.png" alt="Registrar salida" class="action-img">
            <span>Registrar salida</span>
          </a>
          <a href="/entradas" class="action-card">
            <img src="/img/entradas.png" alt="Ver entradas" class="action-img">
            <span>Ver entradas</span>
          </a>
          <a href="/salidas" class="action-card">
            <img src="/img/salidas.png" alt="Ver salidas" class="action-img">
            <span>Ver salidas</span>
          </a>
          <a href="/balance" class="action-card">
            <img src="/img/balance.png" alt="Ver balance" class="action-img">
            <span>Ver balance</span>
          </a>
        </div>
      </div>

    </main>
  </div>
</body>
</html>