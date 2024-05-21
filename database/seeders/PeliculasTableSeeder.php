<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeliculasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peliculas')->insert([
            [
                'titulo' => 'Interstellar (2014)',
                'slug' => 'interstellar-2014',
                'descripcion' => 'Narra las aventuras de un grupo de exploradores que viajan a través de un agujero de gusano en el espacio para asegurar la supervivencia de la humanidad.',
                'genero' => 'accion',
                'clasificacion_edad' => 'Todas las edades',
                'duracion' => 165,
                'banner' => 'storage/peliculas/1716169773_xJHokMbljvjADYdit5fK5.jpg',
                'created_at' => '2024-05-20 01:49:33',
                'updated_at' => '2024-05-20 01:49:33',
            ],
            [
                'titulo' => 'El amanecer del planeta de los simios (2014)',
                'slug' => 'el-amanecer-del-planeta-de-los-simios-2014',
                'descripcion' => 'Un grupo de simios con grandes cualidades para la inteligencia lucha por la supervivencia de su especie contra los humanos.',
                'genero' => 'accion',
                'clasificacion_edad' => 'Todas las edades',
                'duracion' => 130,
                'banner' => 'storage/peliculas/1716172417_ukNUA07F3qWcrCQWVJMO1.jpg',
                'created_at' => '2024-05-20 02:33:37',
                'updated_at' => '2024-05-20 02:33:37',
            ],
            [
                'titulo' => 'Los Vengadores (2012)',
                'slug' => 'los-vengadores-2012',
                'descripcion' => 'Cuando un enemigo inesperado surge como una gran amenaza para la seguridad mundial, Nick Fury, Director de la agencia internacional de paz conocida como S.H.I.E.L.D., se encuentra en la necesidad de formar un equipo de superhéroes para salvar al mundo del desastre.',
                'genero' => 'accion',
                'clasificacion_edad' => 'Todas las edades',
                'duracion' => 143,
                'banner' => 'storage/peliculas/1716172532_9BBTo63ANSmhC4e6r62OJ.jpg',
                'created_at' => '2024-05-20 02:35:32',
                'updated_at' => '2024-05-20 02:35:32',
            ],
            [
                'titulo' => 'Vengadores: Endgame (2019)',
                'slug' => 'vengadores-endgame-2019',
                'descripcion' => 'Después de los eventos devastadores de \'Vengadores: Infinity War\' (2018), el universo está en ruinas. Con la ayuda de los aliados restantes, los Vengadores se reúnen una vez más para intentar deshacer las acciones de Thanos y restaurar el orden en el universo.',
                'genero' => 'accion',
                'clasificacion_edad' => 'Todas las edades',
                'duracion' => 181,
                'banner' => 'storage/peliculas/1716172628_7RyHsO4yDXtBv1zUU3mTp.jpg',
                'created_at' => '2024-05-20 02:37:08',
                'updated_at' => '2024-05-20 02:37:08',
            ],
            [
                'titulo' => 'Vengadores: Infinity War (2018)',
                'slug' => 'vengadores-infinity-war-2018',
                'descripcion' => 'El todopoderoso Thanos ha despertado con la promesa de destruir la mitad del universo, y los Vengadores deben unirse para impedirlo.',
                'genero' => 'accion',
                'clasificacion_edad' => 'Todas las edades',
                'duracion' => 156,
                'banner' => 'storage/peliculas/1716172701_mDfJG3LC3Dqb67AZ52x3Z.jpg',
                'created_at' => '2024-05-20 02:38:21',
                'updated_at' => '2024-05-20 02:38:21',
            ],
        ]);
    }
}
