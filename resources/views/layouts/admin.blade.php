<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
@yield('title')
</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
         @include('layouts.nav')
    <div id="admin">
<div class="columns m-t-5">
  <div class="column is-one-fifth">
<aside class="menu">
  <p class="menu-label">
    Général
  </p>
  <ul class="menu-list">
    <li><a href="{{ route('dashboard') }}" class="{{ $path == 'dashboard' ? 'is-active' : ''  }}">Tableau de bord</a></li>
    <li><a>Clients</a></li>
    <li><a>Commandes</a></li>
  </ul>
  <p class="menu-label">
    Administration
  </p>
  <ul class="menu-list">
    <li><a>Authentification</a></li>
  </ul>
  <p class="menu-label">
    Utilisateurs
  </p>
  <ul class="menu-list">
    <li><a href="{{ route('users.index') }}" class="{{$path == 'users' ? 'is-active' : '' }}">Gérer les utilisateurs</a></li>
    <li><a href="{{ route('permissions.index') }}" class="{{ $path == 'permissions' ? 'is-active' : ''  }}">Roles et Permissions</a></li>
  </ul>
</aside>
  </div>
  <div class="container  dashboard-wrapper">
  	@yield('content')
  </div>
</div>
    </div>
</body>
</html>
