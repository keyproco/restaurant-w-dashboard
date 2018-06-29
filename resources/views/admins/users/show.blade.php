@extends('admins.dashboard')

@section('content')
<div class="card">
	<div class="card-content">
		<form action="{{ route('users.update', $user) }}" method="POST">
			{{ method_field('PUT')  }}
			@csrf
		<div class="field">
  <label class="label">Nom:</label>
  <div class="control">
    <input class="input" type="text" name="name" value ="{{ $user->name }}" placeholder="Text input">
  </div>
</div>
<div class="field">
  <label class="label">Adresse mail</label>
  <div class="control  has-icons-right">
    <input class="input" type="email" name="email" placeholder="Email input" value="{{ $user->email }}">
  </div>
</div>
<div class="field is-grouped">
  <div class="control">
    <button class="button is-link m-t-10">Mettre à jour</button>
  </div>
</div>
</form>
	</div>
</div>
@endsection