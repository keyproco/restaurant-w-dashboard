@include('layouts.head')
<body>
    <div id="admin">
        @include('layouts.nav')
<div class="columns m-t-20">
  <div class="column is-one-fifth">
<aside class="menu">
  <p class="menu-label">
    General
  </p>
  <ul class="menu-list">
    <li><a href="/a/dashboard">Tableau de bord</a></li>
    <li><a>Clients</a></li>
    <li><a>Commandes</a></li>
  </ul>
  <p class="menu-label">
    Administration
  </p>
  <ul class="menu-list">
    <li><a>Authentication</a></li>
  </ul>
  <p class="menu-label">
    Utilisateurs
  </p>
  <ul class="menu-list">
    <li><a href="/a/users">Gérer les utilisateurs</a></li>
    <li><a>Roles et Permissions</a></li>
  </ul>
</aside>
  </div>
  <div class="column  dashboard-wrapper">
  	@yield('content')
  </div>
</div>
    </div>
</body>
</html>
