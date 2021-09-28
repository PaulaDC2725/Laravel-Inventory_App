<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function show(){
        $productsList = Product::has('brand')->get();
        $productsList = Product::has('categories')->get();
        return view('product/list',['productsList'=>$productsList]);
    }
    function form($id = null){
        if($id== null){
            $product = new Product();
        }else{
            $product = Product::findOrFail($id);
        }
        $brand = Brand::all();
        $categories = Categories::all();
        return view('product/formulario',['product' => $product ,'brand' => $brand, 'categories' => $categories]);
    }
    function delete($id){
        //Product::destroy($id);
        $producto = Product::findOrFail($id);
        $producto->delete();
        return redirect('/products');
       // return redirect()-> route('products');
    }
    function save(Request $request){
       $product = new Product();
       if($request->id > 0){
           $product = Product::findOrFail($request->id);
       }
        $request->validate([
            'nameP'=>'required|max:50',
            'costoP'=>'required',
            'precioP'=>'required',
            'cantidadP'=>'required|numeric',
            'marcaP'=>'required|max:50',
            'categoriaP'=>'required|max:50'
        ]);
        $product-> name= $request ->nameP;
        $product-> cost= $request ->costoP;
        $product-> price= $request ->precioP;
        $product-> quantity= $request ->cantidadP;
        $product-> brand_id= $request ->marcaP;
        $product-> categories_id= $request ->categoriaP;

        $product->save();
        return redirect('/products')->with('message','Producto guardado');
    }

}

