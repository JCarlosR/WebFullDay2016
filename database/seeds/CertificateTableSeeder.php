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
            'type' => "Asitente",
            'cost' => 'S/.30.00',
            'enable' => 1,
        ]);
        Certificate::create([
            'event_id' =>1,
            'type' => "Organizador",
            'cost' => 'S/.35.00',
            'enable' => 1,
        ]);
        Certificate::create([
            'event_id' =>1,
            'type' => "Tecnico Informatico",
            'cost' => 'S/.40.00',
            'enable' => 1,
        ]);
    }
}
