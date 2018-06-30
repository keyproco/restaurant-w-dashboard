<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
@yield('title', 'Wait bro')
</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="admin">
        @include('layouts.nav')
<div class="columns m-t-5">
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
