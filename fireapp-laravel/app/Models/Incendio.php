<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incendio extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'gravidade',
        'descricao',
        'ponto_referencia',
        'latitude',
        'longitude',
        'area_poligono', // polígono que você está capturando no formulário
    ];
}
