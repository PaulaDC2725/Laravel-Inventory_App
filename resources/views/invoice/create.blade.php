@extends('layout')
@section('title', $invoice->id ? 'Update Invoice' : 'Create Invoice')
@section('encabezado', $invoice->id ? 'Update Invoice' :'Create Invoice')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> Los campos deben llenarse correctamente.<br><br>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <hr style="border-top: 1px solid rgba(0,0,0,.1);">
            <div class="pull-right">
                <a style="float: right" class="btn btn-primary" href="/categories" title="Volver">Regresar</a>
            </div>
        </div>
    </div>
    <form action="{{-- {{ route('invoice.store') }} --}}" method="POST" id="form1">
        @csrf
        <div class="col-sm-3">
            <div class="form-group">
                <input type="hidden" name="id" class="form-control" >
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3"><b>Productos</b></div>
            <div class="col-sm-3"><b>Cantidad</b></div>
            <div class="col-sm-3"><b>Precio</b></div>
            <div class="col-sm-3"><b>Total Producto</b></div>
        </div>
        <div class="row" id="row0">
            <div class="col-sm-3">
                <div class="form-group">
                    <div class="form-group">
                        <select name="product[]" id="product1" class="form-select product">
                            <option value="">Seleccione un Producto</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="number" value="1" name="quantity[]" id="quantity1" class="form-control quantity" placeholder="Quantity">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="number" id="price1" name="price[]" class="form-control price" placeholder="Price">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" id="totalProduct1" readonly class="form-control-plaintext totalProduct">
                </div>
            </div>
        </div>
    </form>
    <div class="col-sm-3">
        <button class="btn btn-primary" name="addNew" id="addNew">Añadir</button>
    </div>
@endsection
@section('script')
<script>
    const products = @json($products);
    var contador = 1;
    let priceElement = document.querySelector('#price'+contador)
    let quantityElement = document.querySelector('#quantity'+contador)
    let productList = document.querySelector('#product'+contador)


    function init() {
        arrProductList = document.querySelectorAll('.product')
        contador = 1;
        console.log(arrProductList);
        arrProductList.forEach(productList=>{
            priceElement = document.querySelector('#price'+contador)
            console.log(priceElement)
            productList.addEventListener('change', (event) => {
                    productId = event.target.value
                    productSelected = products.filter( product => product.id == productId)
                    priceElement.value = productSelected[0].price
                    totalProduct(contador)
            });
            contador++;
        });
    };

    function totalProduct(){
        totalElement = document.querySelector('.totalProduct')
        totalElement.value = priceElement.value * quantityElement.value
    }
    priceElement.addEventListener('input',(event)=>{
        totalProduct()
    })
    quantityElement.addEventListener('input',(event)=>{
        totalProduct()
    })

    var fila =``;
    const form = document.querySelector('#form1');
    const addNewBtn = document.querySelector('#addNew');
    addNewBtn.addEventListener('click', (event) => {
        fila = document.createElement('div')
        fila.setAttribute("className", "row");
        fila.innerHTML = `
        <div class="row" id="row0">
            <div class="col-sm-3">
                <div class="form-group">
                    <div class="form-group">
                        <select name="product[]" id="product${contador}" class="form-select product">
                            <option value="">Seleccione un Producto</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="number" value="1" name="quantity[]" id="quantity${contador}" class="form-control quantity" placeholder="Quantity">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="number" id="price${contador}" name="price[]" class="form-control price" placeholder="Price">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" id="totalProduct${contador}" readonly class="form-control-plaintext totalProduct">
                </div>
            </div>
        </div>`
        form.appendChild(fila)
        init();
        console.log(contador);
    })
    init();

</script>
@endsection
