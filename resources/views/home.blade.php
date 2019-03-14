@extends('layouts.app')

@section('content')
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
    <div style="background-color: #0A1F30;" class="column"> <router-view> </router-view> </div>
</div></div>
@endsection
