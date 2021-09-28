@extends('layout')
@section('title','Categorias')
@section('encabezado','Lista de Categorias')
@section('content')
<a href="/categories/registro"class="btn btn-primary">Nueva Categoria</a>
@if(session()->has('message'))
<div class="alert alert-success">
   {{session()->get('message')}}
</div>
@endif
<table class="table table-striped table-hover">
    <thead>
       <th>Name</th>
       <th>Description</th>
       <th>Acciones</th>
    </thead>
    <tbody>
@foreach ($categoriesList as $categories)
     <tr>
        <td>{{$categories->name}}</td>
        <td>{{$categories->description}}</td>
        <td>
           <a href="{{ route('categories.form',['id'=>$categories->id])}}" class="btn btn-warning">Editar</a>
           <a href="/categories/delete/{{ $categories->id }}"class="btn btn-danger">Eliminar</a>

        </td>
     </tr>
    @endforeach
</tbody>
</table>
@endsection
