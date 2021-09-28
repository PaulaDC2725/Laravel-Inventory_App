<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    function MostrarForm($id = null){
        if($id == null){
            return ("Debe pasar un id");
        }
        else{
            return("form id: ".$id);
        }
    }
}
