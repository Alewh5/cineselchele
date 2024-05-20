<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{

    use HasSlug;
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * 
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nombre')
            ->saveSlugsTo('slug');
    }

    protected $table = 'sucursales';
    use HasFactory;
 /**
     * 
     *
     * @var string
     */


    protected $fillable = [
        'nombre',
        'direccion',
        'latitud',
        'longitud',
        'telefono',
    ];

    /**
     * 
     *
     * @return array
     */
    public static function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
            'telefono' => 'required|string|max:20',
        ];
    }

    /**
     * 
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function todasOrdenadasPorNombre()
    {
        return static::orderBy('nombre')->get();
    }

    /**
     * 
     *
     * @return int
     */
    public function cantidadSalas()
    {
        return $this->salas->count();
    }

    /**
     * 
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salas()
    {
        return $this->hasMany(Sala::class);
    }
}
