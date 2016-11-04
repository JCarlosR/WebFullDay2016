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
            'cost' => 'S/.30.00',
            'organization' => 'II FULL DAY GERENCIA DE SISTEMAS UNT',
            'enable' => 1,
        ]);
    }
}
