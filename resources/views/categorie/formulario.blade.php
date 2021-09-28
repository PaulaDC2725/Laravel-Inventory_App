@extends('layout')
@section('title',$categorie->id ? 'Actualizar Categoria' : 'Crear Marca')
@section('title',$categorie->id ? 'Actualizar Categoria' : 'Crear Marca')
@section('content')
<body>
   <form action="{{ route('categorie.save')}}" method="POST">
     @csrf 
     <div class="form-group">
       
        <input type="hidden" class="form-control" id="id" name="id" value="{{ old('id') ? old('id'): $Categorie->id }}"
               aria-describedby="nameP" placeholder="Escriba el Codigo de la categoria">
      </div>
    <div class="form-group">
        <label for="nameP">Nombre de la marca</label>
        <input type="text" class="form-control" id="nameC" name="nameC" value="{{ old('nameC') ? old('nameC'): $Categorie->name }}"
               aria-describedby="nameB" placeholder="Escriba el nombre de la categoria">
      </div>
      @error('nameC')
      <div class="form-group">
        <label for="descripcionC">Nombre de la marca</label>
        <input type="text" class="form-control" id="descripcionC" name="descripcionC" value="{{ old('descripcionC') ? old('descripcionC'): $Categorie->description }}"
               aria-describedby="nameB" placeholder="Escriba la descripción de la categoria">
      </div>
      @error('descripcionC')
      <div class="text-danger">
        {{$message}}
      </div>
      @enderror
      <br>
      <center>
            <a href="/products" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-info">Guardar</button>
      </center>
    </form>
</body>

@endsection