@extends('layouts.admin')
@section('title', 'Tableau de bord')
@section('content')
<div  id="chart" class="columns">
    <div class="column is-one-thirds">
                  <graph :labels="{{ $labels }}" 
                   :values="{{ $users }}" 
                   color="rgba(121,234,231)"
                   color.background = 'red'
             ></graph>
  </div>
    <div class="column is-one-thirds">
            <graph :labels="['January', 'February', 'March']" 
                   :values="[10, 42, 4]"
                   color="blue"
             >
            </graph>
    </div>
</div>
@endsection


