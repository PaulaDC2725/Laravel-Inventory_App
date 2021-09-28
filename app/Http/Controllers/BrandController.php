<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function show(){
        $brandsList = Brand::get();
        return view('brand/list',['brandsList'=>$brandsList]);
    }
    function form($id = null){
        if($id== null){
            $brand = new brand();
        }else{
            $brand = brand::findOrFail($id);
        }
        return view('brand/formulario',['brand' => $brand]);
    }
    function delete($id){
        //brand::destroy($id);
        $brand = brand::findOrFail($id);
        $brand->delete();
        return redirect('/brands');
       // return redirect()-> route('brand');
    }
    function save(Request $request){
       $brand = new brand();
       if($request->id > 0){
           $brand = brand::findOrFail($request->id);
       }
        $request->validate([
            'nameB'=>'required|max:50',
        ]);
        $brand-> name= $request ->nameB;


        $brand->save();
        return redirect('/brands')->with('message','Marca guardada');
    }
    
}
