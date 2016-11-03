<?php

use App\Solicitude;
use Illuminate\Database\Seeder;

class SolicitudesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Solicitude::create([
            'user_id'=>3,
            'cert_id'=>1
        ]);
    }
}
