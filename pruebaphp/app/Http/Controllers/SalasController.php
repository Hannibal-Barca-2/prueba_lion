<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sala;

class SalasController extends Controller{

    //Función que muestra todos los registros de salas
    public function index(){
        $id_usuario=auth()->id();
        
        $salas = DB::table('salas')
        ->select('salas.id', 'salas.nombre')
        ->where('user_id', '=', $id_usuario)
        ->get();

        return view('Salas.index', compact('salas'));
    }
    
    //Función que muestra la vista de las salas
    public function create (){
        return view('salas.crear');
    }


    //Función que registra nuevas salas
    public function store (Request $request){

        $sala_nueva = new Sala();
        $sala_nueva->nombre = $request->nombre;
        $sala_nueva->user_id = auth()->id();
        $sala_nueva->save();

        return redirect()->route('salas');
    }
    //Función que elimina salas
    public function destroy ($id)
    {
        DB::table('salas')
        ->where('id','=',$id)
        ->delete();

        return redirect()->route('salas');
    }

}