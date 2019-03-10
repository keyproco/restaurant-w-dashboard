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

  <div id="chart"  class="columns" >
    <div class="column is-one-fifth">
      <section>
        <aside class="menu">
          <p class="menu-label">Général</p>
          <ul class="menu-list">
            <li>
              <router-link to="/admin/dashboard/" exact > Tableau de bord </router-link>  
            </li>
            <li>
              <a>Commandes</a>
            </li>
            <li>
              <a>Paniers</a>
            </li>          
          </ul>
          <p class="menu-label">Gestion des aliments</p>
          <ul class="menu-list">
            <li>
               <router-link to="/admin/dashboard/manage-products" exact> Gérer les produits </router-link>  
            </li>
            <li>
              <a >Manage Your Team</a>
            </li>
            <li>
              <a>Invitations</a>
            </li>
            <li>
              <a>Cloud Storage Environment </a>
            </li>
            <li>
              <a>Authentication</a>
            </li>
          </ul>
          <p class="menu-label">Gestion des ressources</p>
          <ul class="menu-list">
            <li>
              <a>Permissions</a>
            </li>
            <li>
 <router-link to="/admin/dashboard/manage-users" exact > Utilisateurs</router-link>  
            </li>
            <li>
              <a>Staff</a>
            </li>
          </ul>
        </aside>
      </section>
    </div>
    <div class="column">  <router-view> </router-view></div>

  </div>





  <div class="  dashboard-wrapper">
  
  <div  id="chart" >
  <router-view> </router-view>



</div>
  </div>
</div>
    </div>
</body>
</html>
