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
    </thead>
    <tbody>
@foreach ($categoriesList as $categorie)
     <tr>
        <td>{{$categorie->name}}</td>
        <td>
           <a href="{{ route('categorie.form',['id'=>$categorie->id])}}" class="btn btn-warning">Editar</a>
           <a href="/categorie/delete/{{ $categorie->id }}"class="btn btn-danger">Eliminar</a>

        </td>
     </tr>
    @endforeach
</tbody> 
</table>
@endsection