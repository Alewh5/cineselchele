<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proyeccion;
use App\Models\Asiento;

class Sala extends Model
{  
    use HasSlug;    

    /**
     * 
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nombre')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    use HasFactory;
    
    protected $fillable = [
        'sucursal_id',
        'nombre',
        'capacidad_asientos',
    ];
    

    /**
     * 
     */
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }

    public function proyecciones()
    {
        return $this->hasMany(Proyeccion::class);
    }

    /**
     * 
     */
    public function asientos()
    {
        return $this->hasMany(Asiento::class);
    }

}
