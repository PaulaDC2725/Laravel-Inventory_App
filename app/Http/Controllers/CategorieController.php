<?php

namespace App\Http\Controllers;
use App\Models\Categorie;
use Illuminate\Http\Request;
class CategorieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function show(){
        $CategoriesList = Categorie::get();
        return view('categorie/list',['CategoriesList'=>$CategoriesList]);
    }
    function form($id = null){
        if($id== null){
            $categorie = new categorie();
        }else{
            $categorie = categorie::findOrFail($id);
        }
        return view('categorie/formulario',['categorie' => $categorie]);
    }
    function delete($id){
        //brand::destroy($id);
        $categorie = categorie::findOrFail($id);
        $categorie->delete();
        return redirect('/categories');
       // return redirect()-> route('brand');
    }
    function save(Request $request){
       $categorie = new categorie();
       if($request->id > 0){
           $categorie = categorie::findOrFail($request->id);
       }
        $request->validate([
            'nameB'=>'required|max:50',
        ]);
        $categorie-> name= $request ->nameB;


        $categorie->save();
        return redirect('/categories')->with('message','Categoria guardada');
    }
    
}

