<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/usuario', function () {
    return ('BIENVENIDO USUARIO');
});
Route::get('/usuario{id}', function ($id) {
    return ("El id del usuario es: ".$id);
});

Route::get('/form/{id?}', [PersonaController:: class, ("MostrarForm")]
)->where('id','[0-9]+');
//use Illuminate\Support\Facades\DB;
// use App\Models\Product;
// Route::get('/products', function(){
//     // $products = DB::table('product')->get();
//     $products = Product::get();
//     return dd($products); //var_dump
// });
Route ::get('/products',[ProductController::class, 'show']);
Route ::get('/products/registro/{id?}',[ProductController::class, 'form'])->name('product.form');
Route::get('/product/delete/{id}',[ProductController::class, 'delete'])->name('prodDelete');
Route::post('product/save', [ProductController::class, 'save'])->name('product.save');


Route ::get('/brands',[BrandController::class, 'show']);
Route ::get('/brands/registro/{id?}',[BrandController::class, 'form'])->name('brand.form');
Route::get('/brands/delete/{id}',[BrandController::class, 'delete'])->name('brandDelete');
Route::post('brands/save', [BrandController::class, 'save'])->name('brand.save');

Route ::get('/categories',[CategoriesController::class, 'show']);
Route ::get('/categories/registro/{id?}',[CategoriesController::class, 'form'])->name('categories.form');
Route::get('/categories/delete/{id}',[CategoriesController::class, 'delete'])->name('categoriesDelete');
Route::post('categories/save', [CategoriesController::class, 'save'])->name('categories.save');
Auth::routes();

Route::get('/invoice', [InvoiceController::class, 'show']);
Route::get('/invoice/create/{id?}', [InvoiceController::class , 'create'])->name('invoice.create');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
