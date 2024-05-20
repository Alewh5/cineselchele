<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelicula_id',
        'sucursal_id',
        'fecha',
        'hora_inicio',
        'duracion',
    ];

    /**
     * 
     */
    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class);
    }

    /**
     * 
     */
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }
}
