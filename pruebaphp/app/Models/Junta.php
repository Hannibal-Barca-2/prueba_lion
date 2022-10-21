<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Junta extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'fecha',
        'horaInicio',
        'horaFin',
        'sala_id'
    ];
}