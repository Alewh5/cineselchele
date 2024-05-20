<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Proyeccion;
use App\Models\User;
use App\Models\Asiento;
use App\Models\Pelicula;

class Reserva extends Model
{
    protected $fillable = ['proyeccion_id', 'user_id', 'asiento_id', 'pelicula', 'reserva'];

    public function proyeccion()
    {
        return $this->belongsTo(Proyeccion::class);
    }
    
    protected static function booted()
    {
        static::creating(function ($reserva) {
            $reserva->asiento->update(['estado' => 'Reservado']);
        });

        // Evento que se dispara antes de eliminar una reserva
        static::deleting(function ($reserva) {
            $reserva->asiento->update(['estado' => 'Disponible']);
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function asiento()
    {
        return $this->belongsTo(Asiento::class);
    }

    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class);
    }

    public function liberar()
    {
        $this->asiento->update(['reservado' => 0]);
    }

}
