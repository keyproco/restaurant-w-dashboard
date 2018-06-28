@extends('admins.dashboard')


@section('content')
<table class="table is-center">
  <thead>
    <tr>
      <th><abbr title="ID">ID</abbr></th>
      <th>Nom</th>
      <th><abbr title="Mail">Adresse mail</abbr></th>
      <th><abbr title="Creation-Date">Date de création</abbr></th>
      <th><abbr title="Modification-Date">Date de modification</abbr></th>
       <th><abbr title="Update-date">Action</abbr></th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th><abbr title="Users">{{ $number }}</abbr></th>
    </tr>
  </tfoot>
   	@foreach($users as $user)
  <tbody>
    <tr>
      <th>{{ $user->id }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->created_at }}</td>
      <td>{{ $user->updated_at }}</td>
      </td>
    </tr>
  </tbody>
       @endforeach
</table>
@endsection