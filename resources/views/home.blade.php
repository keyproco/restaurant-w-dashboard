@extends('layouts.app')

@section('content')
<div id="app" class="columns">
    <div class="column is-one-quarter">
        <aside class="menu">
  <p class="menu-label">
    Options
  </p>
  <ul class="menu-list">
    <li><router-link to="mon-compte" exact >Mon compte</router-link></li>

    <li><router-link to="mes-commandes" exact >Mes commandes</router-link>  </li>
    <li><router-link to="mes-paiements" exact >Mes paiements</router-link></li>
  </ul>
</aside>
    </div>
    <div class="column">  <router-view> </router-view></div>
</div>
@endsection
