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
            'type' => "Asistente",
            'cost' => 30.00,
        ]);
    }
}
