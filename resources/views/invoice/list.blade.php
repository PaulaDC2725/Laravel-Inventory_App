@extends('layout')
@section('title', 'Facturas')
@section('encabezado', 'Lista de facturas')
@section('content')
    {{-- <a class="btn btn-info" style="float: right; margin-top: 20px; margin-bottom: 35px;" href="{{ route('product.form') }}}">Nuevo Producto</a> --}}
    <a class="btn btn-info" style="float: right; margin-top: 20px; margin-bottom: 35px;" href="{{ route('invoice.create') }}">Nueva
        Factura</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-striped table-bordered">
        <thead align="center">
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Subtotal</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody align="center">
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->created_at }}</td>
                    <td>$ {{ number_format($invoice->subtotal, 0, ',', '.') }}</td>
                    <td>$ {{ number_format($invoice->total, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{-- {{ route('invoice.create',['id'=>$invoice->id]) }} --}}" class="btn btn-primary">Editar</a>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modal{{ $invoice->id }}">
                            Detalle
                        </button>
                        {{-- <a href="/invoice/delete/{{ $invoice->id }}" class="btn btn-danger">Borrar</a> --}}
                        {{-- <a href="{{ route('prodDelete', ['id => $product->id']) }}" class="btn btn-danger">Borrar</a> --}}
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="modal{{ $invoice->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Invoice Detail # {{ $invoice->id }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-3">Producto</div>
                                    <div class="col-sm-3">Cantidad</div>
                                    <div class="col-sm-3">Precio</div>
                                    <div class="col-sm-3">Total Producto</div>
                                </div>
                                <div class="row">
                                    @foreach ($invoice->products as $product)
                                        <div class="col-sm-3">{{ $product->name }}</div>
                                        <div class="col-sm-3">{{ $product->pivot->quantity }}</div>
                                        <div class="col-sm-3">{{ $product->pivot->price }}</div>
                                        <div class="col-sm-3">
                                            {{ $product->pivot->quantity * $product->pivot->price }}</div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-3">Subtotal:</div>
                                    <div class="col-sm-3">{{ $invoice->subtotal }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-3">IVA:</div>
                                    <div class="col-sm-3">{{ number_format($invoice->total-$invoice->subtotal, 0, ',', '.') }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-3">Total:</div>
                                    <div class="col-sm-3">{{ $invoice->total }}</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </tbody>
    </table>
@endsection
