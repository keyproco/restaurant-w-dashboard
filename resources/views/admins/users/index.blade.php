@extends('admins.dashboard')


@section('content')
<div class="card">
	<div class="card-content">
<table class="table is-center">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Adresse mail</th>
      <th>Date de création</th>
      <th>Date de modification</th>
       <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    	@foreach($users as $user)
    <tr>
      <th>{{ $user->id }}</th>
      <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->created_at->toFormattedDateString() }}</td>
      <td>{{ $user->updated_at->toFormattedDateString() }}</td>
      <td><a href="{{ route('users.edit', $user) }}" class="button is-success">Modifier</a>
<a href="{{ route('users.show', $user) }}" class="button is-info">Afficher</a>
<a href="{{ route('users.destroy', $user) }}" class="button is-danger">Supprimer</a></td>
      </td>
    </tr>
           @endforeach
  </tbody>
</table>		


{{ $users->links('vendor.pagination.default') }}
</div>

@endsection