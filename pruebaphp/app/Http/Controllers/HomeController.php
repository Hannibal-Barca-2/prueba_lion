<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id_usuario=auth()->id();
        $fecha_actual=now();

        $juntas = DB::table('juntas')
        ->select('juntas.fecha', 'juntas.horaInicio', 'juntas.horaFin', 'salas.nombre')
        ->join('salas', 'juntas.sala_id', '=', 'salas.id')
        ->where('salas.user_id','=',$id_usuario)
        ->where('juntas.fecha', '>=',$fecha_actual)
        ->get();

        return view('home', compact('juntas'));
    }
}
