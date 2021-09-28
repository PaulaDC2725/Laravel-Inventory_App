@extends('layout')
@section('title','Productos')
@section('encabezado','Lista de Productos')
@section('content')
<a href="/products/registro"class="btn btn-primary">Nuevo Producto</a>
@if(session()->has('message'))
<div class="alert alert-success">
   {{session()->get('message')}}
</div>
@endif
<table class="table table-striped table-hover">
    <thead>
       <th>Name</th>
       <th>Cost</th>
       <th>Price</th>
       <th>Quantity</th>
       <th>Brand</th>
       <th>Categories</th>
       <th>Acciones</th>
    </thead>
    <tbody>
@foreach ($productsList as $product)
     <tr>
        <td>{{$product->name}}</td>
        <td>{{$product->cost}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->quantity}}</td>
        <td>{{$product->brand->name}}</td>
        <td>{{$product->categories->name}}</td>
        <td>
           <a href="{{ route('product.form',['id'=>$product->id])}}" class="btn btn-warning">Editar</a>
           <a href="/product/delete/{{ $product->id }}"class="btn btn-danger">Eliminar</a>

        </td>
     </tr>
    @endforeach
</tbody> 
</table>
@endsection