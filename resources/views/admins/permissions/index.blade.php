@extends('layouts.admin')
@section('title', 'Tableau de bord')
@section('content')
<div  id="chart" class="columns">
    <div class="column is-one-thirds">
@foreach ($permissions as $permission)
  {{ $permission->name }}
@endforeach
  </div>
</div>
@endsection


