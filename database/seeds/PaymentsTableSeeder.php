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
            'solicitude_id'=>1,
            'entity'=>'AGENTE BCP',
            'payment_file'=>'xyz.png',
            'amount'=>20,
            'operation'=>1001001,
            'operation_date'=>'28-10-2016'
        ]);
    }
}
