@extends('layouts.app')

@section('content')
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<div class="container">
<div id="app" class="columns">
    <div  style="background-color: #172A39; " class="column is-narrow">
        <aside class="menu">
  <p class="menu-label">
    Options
  </p>
  <ul class="menu-list">
    <li><router-link to="home" exact >Accueil</router-link></li>
    <li><router-link to="mon-compte" exact >Mon compte</router-link></li>

    <li><router-link to="mes-commandes" exact >Mes commandes</router-link>  </li>
    <li><router-link to="mes-paiements" exact >Mes paiements</router-link></li>
  </ul>
</aside>
    </div>
  <div style="background-color: #0A1F30;" class="column">
    <router-view> </router-view>
  </div>
</div></div>
<style>
.menu-list a {
    color: white;
    font-weight: 600;
}
.menu-list a.is-active {
    background-color: #c59d5f;
}
.menu-list a:hover {
    background-color: #0a1f30;
    color: #c59d5f;
}</style>

@endsection
