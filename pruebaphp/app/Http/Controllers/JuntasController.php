<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Junta;

class JuntasController extends Controller{
    
    //Función que muestra 
    public function create (){

        $salas = DB::table('salas')
        ->select('salas.id', 'salas.nombre')
        ->where('user_id','=',auth()->id())
        ->get();

        $salas = json_encode($salas);

        return view('juntas.crear', compact('salas'));
    }

    //Función que registra nuevas juntas 
    public function store (Request $request){

        $junta_nueva = new Junta();
        $junta_nueva->fecha = $request->fecha;
        $junta_nueva->horaInicio = $request->horaInicio;
        $junta_nueva->horaFin = $request->horaFin;
        $junta_nueva->sala_id = $request->sala_id;
        $junta_nueva->save();

        
    }

    //Función que muestra las dos posibles opciones al usuario
    //Consiste en,dependiendo de la gora seleccionada se le suma una hora y dos para poder mostrarla como 
    //opción en la hora final de la junta
    //Pero tiene un error
    public function traerHoras(Request $request){
        $opcion1 = $request->horaFin->modify('+1 hours') ;
        $opcion2 = $request->horaFin->modify('+2 hours') ;

        $horas[0] = $opcion1;
        $horas[1] = $opcion2;

        return $horas;
    }

    public function destroy ($id)
    {
        DB::table('juntas') 
        ->where('id','=',$id)
        ->delete();

        return redirect()->route('home');
    }

}