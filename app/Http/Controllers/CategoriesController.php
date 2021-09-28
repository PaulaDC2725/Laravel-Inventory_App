<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function show()
    {
        $categoriesList = Categories::get();
        return view('categories/list', ['categoriesList' => $categoriesList]);
    }
    function form($id = null)
    {
        if ($id == null) {
            $categories = new Categories();
        } else {
            $categories = Categories::findOrFail($id);
        }
        return view('categories/formulario', ['categories' => $categories]);
    }
    function delete($id)
    {
        //brand::destroy($id);
        $categories = Categories::findOrFail($id);
        $categories->delete();
        return redirect('/categories');
        // return redirect()-> route('brand');
    }
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function save(Request $request)
    {
        $categories = new Categories();

        if($request->id>0){
            $categories = Categories::findOrFail($request->id);
        }
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:50'
        ]);

        $categories->name = $request->name;
        $categories->description = $request->description;

        $categories->save();
        return redirect('/categories')->with('message', 'Categoria guardada');
    }
}

