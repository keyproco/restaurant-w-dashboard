@extends('layouts.admin')
@section('title', 'Produits')
@section('content')
<div id="products">
<product-table :products="{{ $products }}" > </product-table>
  <create-product @created="createProduct"> </create-product>
</div>
@endsection


