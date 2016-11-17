<?php

use Illuminate\Database\Seeder;
use App\Certificate;

class CertificateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Certificate::create([
            'event_id' =>1,
            'type' => "a nombre de la Escuela Académico Profesional de Ingeniería de Sistemas UNT",
            'cost' => 30.00,
        ]);
        Certificate::create([
            'event_id' =>1,
            'type' => "a nombre de ISACA Student Group UNT",
            'cost' => 30.00,
        ]);
    }
}
