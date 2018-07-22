@extends('layouts.admin')
@section('title', 'Produits')
@section('content')
<div id="products">
  <product-table :products="{{ $products }}" > </product-table>
</div>
@endsection


