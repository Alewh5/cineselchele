<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelicula;
use App\Models\Reserva;
use App\Models\Asiento;

class Proyeccion extends Model
{
    
    use HasFactory;

    protected $table = 'proyecciones';

    protected $fillable = [
        'sala_id',
        'pelicula_id',
        'hora_inicio',
        'hora_fin',
    ];

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }

    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class);
    }

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }

    public function asientos()
    {
        return $this->belongsTo(Asiento::class);
    }

}
