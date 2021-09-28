@extends('layout')
@section('title','Marcas')
@section('encabezado','Lista de Marcas')
@section('content')
<a href="/brands/registro"class="btn btn-primary">Nueva Marca</a>
@if(session()->has('message'))
<div class="alert alert-success">
   {{session()->get('message')}}
</div>
@endif
<table class="table table-striped table-hover">
    <thead>
       <th>Name</th>
       <th>Acciones</th>
    </thead>
    <tbody>
@foreach ($brandsList as $brand)
     <tr>
        <td>{{$brand->name}}</td>
        <td>
           <a href="{{ route('brand.form',['id'=>$brand->id])}}" class="btn btn-warning">Editar</a>
           <a href="/brand/delete/{{ $brand->id }}"class="btn btn-danger">Eliminar</a>

        </td>
     </tr>
    @endforeach
</tbody>
</table>
@endsection