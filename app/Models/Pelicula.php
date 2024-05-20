<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasSlug;
    
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('titulo')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    use HasFactory;

    protected $table = 'peliculas';

    protected $fillable = [
        'titulo',
        'descripcion',
        'genero',
        'clasificacion_edad',
        'duracion',
        'banner',
    ];

    /**
     * 
     *
     * @param array $data
     * @return Pelicula
     */
    public static function crearPelicula(array $data)
    {
        return static::create($data);
    }

    /**
     * 
     *
     * @param array $data
     * @return bool
     */
    public function actualizarPelicula(array $data)
    {
        return $this->update($data);
    }

    /**
     * 
     *
     * @return bool|null
     */
    public function eliminarPelicula()
    {
        return $this->delete();
    }
}
