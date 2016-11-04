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
            'type' => "Asitente",
            'cost' => 'S/. 30.00',
            'event_id' => 1,
            'enable' => 1,
        ]);

        Certificate::create([
            'type' => "Prueba",
            'cost' => 'S/. 30.00',
            'event_id' => 1,
            'enable' => 1,
        ]);
    }
}
