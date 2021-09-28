@extends('layout')
@section('title', $categories->id ? 'Actualizar Categoria' : 'Crear Categoria')
@section('title', $categories->id ? 'Actualizar Categoria' : 'Crear Categoria')
@section('content')

    <body>
        <form action="{{ route('categories.save') }}" method="POST">
            @csrf
            <div class="form-group">

                <input type="hidden" class="form-control" id="id" name="id"
                    value="{{ old('id') ? old('id') : $categories->id }}" aria-describedby="id"
                    placeholder="Escriba el Codigo de la categoria">
            </div>
            <div class="form-group">
                <label for="nameP">Nombre de la categoria</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name') ? old('name') : $categories->name }}" aria-describedby="nameC"
                    placeholder="Escriba el nombre de la categoria">
            </div>
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <label for="descripcionC">Descripción de la categoria</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="{{ old('description') ? old('description') : $categories->description }}"
                    aria-describedby="description" placeholder="Escriba la descripción de la categoria">
            </div>
            @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <br>
            <center>
                <a href="/categories" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-info">Guardar</button>
            </center>
        </form>
    </body>

@endsection

