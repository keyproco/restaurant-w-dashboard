@extends('layouts.app')

@section('content')
<div class="columns">
  <div class="column is-one-fifth">
<aside class="menu">
  <p class="menu-label">
    General
  </p>
  <ul class="menu-list">
    <li><a>Tableau de bord</a></li>
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
    <li><a>Gérer les utilisateurs</a></li>
    <li><a>Roles et Permissions</a></li>
  </ul>
</aside>
  </div>
  <div class="column dashboard-wrapper">
  	<div class="columns"> 
  		<div class="column is-one-third"><div class="box">Stats</div> 
  	</div> 
  	<div class="column is-one-third">
  		<div class="box">Informations</div> 
	</div> 
	<div class="column is-one-third">
  		<div class="box">Données</div> </div>
	</div>
	<div class="columns">
		<div class="column is-half">Une charte</div>
		<div class="column is-half">Une autre charte</div>
	</div>
  </div>
</div>
@endsection
