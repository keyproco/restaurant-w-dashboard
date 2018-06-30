@extends('layouts.admin')
@section('title', 'Tableau de bord')

@section('content')
<div class="columns">
    <div class="column is-one-thirds">
    <div class="box"></div>
  </div>

  <div class="column is-one-thirds">
    <div class="box">Stats here</div>
  </div>
  <div class="column is-one-thirds">
    <div class="box">Stats here</div>
  </div>
</div>
<div id="chart">
          <div class="container">
            <graph :labels="{{ $labels }}" 
                   :values="{{ $users }}" 
                   color="rgba(121,234,231)"
                   color.background = 'red'
             ></graph>
        </div>
                <div class="container">
            <graph :labels="['January', 'February', 'March']" 
                   :values="[10, 42, 4]"
                   color="blue"
             ></graph>
        </div>
</div>
@endsection

