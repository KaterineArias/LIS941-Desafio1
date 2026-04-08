<nav class="sidebar">
  <div class="sidebar-header">
    <a href="/dashboard">
      <img src="/img/finance.png" alt="Logo Finanzas" class="sidebar-logo">
    </a>
    <h2>Finanzas</h2>
  </div>
  <ul class="sidebar-menu">
    <li><a href="/entradas/registrar">Registrar entrada</a></li>
    <li><a href="/salidas/registrar">Registrar salida</a></li>
    <li><a href="/entradas">Ver entradas</a></li>
    <li><a href="/salidas">Ver salidas</a></li>
    <li><a href="/balance">Mostrar balance</a></li>
  </ul>
  <div class="sidebar-footer">
    <form action="/logout" method="POST">
      @csrf
      <button type="submit" class="btn-logout">Cerrar sesión</button>
    </form>
  </div>
</nav>