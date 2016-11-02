<?php

use App\Payment;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create([
            'entity'=>'AGENTE BCP MENDANDEZ',
            'payment_file'=>'xyz.png',
            'operation'=>1,
            'operation_date'=>'28-10-2016'
        ]);
    }
}
