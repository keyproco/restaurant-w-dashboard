@extends('layouts.admin')
@section('title', 'Tableau de bord')
@section('content')
<div class="card m-t-10">
	<div class="card-content">
<table class="table is-center">
  <thead>
    <tr>
      <th>ID</th>
      <th>Permission</th>
      <th>Nom d'affichage</th>
      <th>Date de création</th>
      <th>Date de modification</th>
       <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    	@foreach($permissions as $permission)
    <tr>
      <th>{{ $permission->id }}</th>
      <td><a href="">{{ $permission->display_name }}</a></td>
      <td>{{ $permission->description }}</td>
      <td>{{ $permission->created_at->toFormattedDateString() }}</td>
      <td>{{ $permission->updated_at->toFormattedDateString() }}</td>
      <td><a href="" class="button is-success">Modifier</a>
<a href="" class="button is-info">Afficher</a>
<a href="" class="button is-danger">Supprimer</a></td>
      </td>
    </tr>
           @endforeach
  </tbody>
</table>	
@endsection


