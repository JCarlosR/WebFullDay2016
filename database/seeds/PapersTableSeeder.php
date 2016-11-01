<?php

use App\Paper;
use Illuminate\Database\Seeder;

class PapersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paper::create([
            'speaker_id' => 1,
            'subject' => 'Gestión de proyectos en la nube',
            'description' => '',
            'start' => '',
            'end' => '',
            'realization' => '2016/11/26',
            'enable' => 1,
        ]);

        Paper::create([
            'speaker_id' => 2,
            'subject' => 'Transformación digital',
            'description' => '',
            'start' => '',
            'end' => '',
            'realization' => '2016/11/26',
            'enable' => 1,
        ]);

        Paper::create([
            'speaker_id' => 3,
            'subject' => 'Cómo estructurar y gestionar un portafolio de inversiones en TI',
            'description' => '',
            'start' => '',
            'end' => '',
            'realization' => '2016/11/26',
            'enable' => 1,
        ]);

        Paper::create([
            'speaker_id' => 4,
            'subject' => 'El CIO ¿Cómo dar el salto al nivel estratétigo del negocio?',
            'description' => '',
            'start' => '',
            'end' => '',
            'realization' => '2016/11/26',
            'enable' => 1,
        ]);

        Paper::create([
            'speaker_id' => 5,
            'subject' => 'Contribución del areá de TI a la consecución de los resultados financieros',
            'description' => '',
            'start' => '',
            'end' => '',
            'realization' => '2016/11/26',
            'enable' => 1,
        ]);
    }
}
