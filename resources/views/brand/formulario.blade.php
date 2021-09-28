@extends('layout')
@section('title',$brand->id ? 'Actualizar Marca' : 'Crear Marca')
@section('title',$brand->id ? 'Actualizar Marca' : 'Crear Marca')
@section('content')
<body>
   <form action="{{ route('brand.save')}}" method="POST">
     @csrf
     <div class="form-group">

        <input type="hidden" class="form-control" id="id" name="id" value="{{ old('id') ? old('id'): $brand->id }}"
               aria-describedby="nameP" placeholder="Escriba el Codigo de la Marca">
      </div>
    <div class="form-group">
        <label for="nameP">Nombre de la marca</label>
        <input type="text" class="form-control" id="nameB" name="nameB" value="{{ old('nameB') ? old('nameP'): $brand->name }}"
               aria-describedby="nameB" placeholder="Escriba el nombre de la Marca">
      </div>
      @error('nameB')
      <div class="text-danger">
        {{$message}}
      </div>
      @enderror
      <br>
      <center>
            <a href="/brands" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-info">Guardar</button>
      </center>
    </form>
</body>

@endsection
