@extends('layouts.admin')

@section('title') Gérer les utilisateurs @endsection
@section('content')
<div class="card m-t-15 m-b-15">
	<div class="card-content">
<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Adresse mail</th>
      <th>Créé</th>
      <th>Modifié</th>
       <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    	@foreach($users as $user)
    <tr>
      <th>{{ $user->id }}</th>
      <td> <a href="{{ route('users.show', $user->id) }}"> {{ $user->name }} </a> </td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->created_at->toFormattedDateString() }}</td>
      <td>{{ $user->updated_at->toFormattedDateString() }}</td>
      <td><a href="{{ route('users.edit', $user) }}" class="button is-success">Modifier</a>
      <a href="{{ route('users.show', $user) }}" class="button is-info">Afficher</a>
  <form action="{{ route('users.destroy', $user->id) }}" method="POST" accept-charset="utf-8">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
  <button class="button is-danger">Supprimer</button></td>
  </form>
      </td>
    </tr>
           @endforeach
  </tbody>
</table>		


{{ $users->links('vendor.pagination.default') }}
</div>

@endsection