<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumaController extends Controller
{
    public function index(){
        return view('suma',['resultado' => null]);
    }

    public function suma(Request $request){
        $num1 = $request->input('num1');
        $num2 = $request->input('num2');
        $resultado = $num1 + $num2;
        
        // Devuelve la misma vista, pero esta vez con el resultado
        return view('suma', ['resultado' => $resultado]);
    }
}
