@extends('layout')
@section('title', $product->id ? 'Actualizar Producto' : 'Crear Producto')
@section('title', $product->id ? 'Actualizar Producto' : 'Crear Producto')
@section('content')

    <body>
        <form action="{{ route('product.save') }}" method="POST">
            @csrf
            <div class="form-group">

                <input type="hidden" class="form-control" id="id" name="id"
                    value="{{ old('id') ? old('id') : $product->id }}" aria-describedby="nameP"
                    placeholder="Escriba el Codigo del Producto">
            </div>
            <div class="form-group">
                <label for="nameP">Nombre del Producto</label>
                <input type="text" class="form-control" id="nameP" name="nameP"
                    value="{{ old('nameP') ? old('nameP') : $product->name }}" aria-describedby="nameP"
                    placeholder="Escriba el nombre del Producto">
            </div>
            @error('nameP')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror


            <div class="form-group">
                <label for="costoP">Costo del Producto</label>
                <input type="text" class="form-control" id="costoP" name="costoP"
                    value="{{ old('costoP') ? old('costoP') : $product->cost }}" aria-describedby="costoP"
                    placeholder="Escriba el costo del Producto">
            </div>
            @error('costoP')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <label for="precioP">Precio del Producto</label>
                <input type="text" class="form-control" id="precioP" name="precioP"
                    value="{{ old('precioP') ? old('precioP') : $product->price }}" aria-describedby="precioP"
                    placeholder="Escriba el precio del Producto">
            </div>
            @error('precioP')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <label for="cantidadP">Cantidad del Producto</label>
                <input type="text" class="form-control" id="cantidadP" name="cantidadP"
                    value="{{ old('cantidadP') ? old('cantidadP') : $product->quantity }}" aria-describedby="cantidadP"
                    placeholder="Escriba la cantidad del Producto">
            </div>
            @error('cantidadP')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <strong>Brand:</strong>
                {{-- <input type="number" id="brand_id" name="brand_id" value="{{ old('brand_id') ? old('brand_id') : $product->brand_id }}" class="form-control" placeholder="Brand"> --}}
                <select name="marcaP" id="marcaP" class="form-select">
                    @foreach ($brand as $brands)
                        <option value="{{ $brands->id }}" {{ $product->brand_id === $brands->id ? 'selected' : '' }}>
                            {{ $brands->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('marcaP')
                <div class="text-danger">categoriaP
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <strong>Category:</strong>
                {{-- <input type="number" id="brand_id" name="brand_id" value="{{ old('brand_id') ? old('brand_id') : $product->brand_id }}" class="form-control" placeholder="Brand"> --}}
                <select name="categoriaP" id="categoriaP" class="form-select">
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}"
                            {{ $product->categories_id === $categorie->id ? 'selected' : '' }}>{{ $categorie->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('categoriaP')
                <div class="text-danger">
                    {{ $message }}
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
