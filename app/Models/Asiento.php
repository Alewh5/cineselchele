<?php

namespace App\Models;
use App\Models\Sala;
use App\Models\Reserva;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asiento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'proyeccion_id', 'reservado', 'sala_id', 'estado'];

    /**
     * Obtener la proyección asociada al asiento.
     */
    public function proyeccion()
    {
        return $this->belongsTo(Proyeccion::class);
    }

    public function show($sala_id)
    {
        $sala = Sala::findOrFail($sala_id);

        return view('asientos.show', compact('sala'));
    }

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }

    public function sala(): BelongsTo
    {
        return $this->belongsTo(Sala::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
