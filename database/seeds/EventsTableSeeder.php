<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Event::create([
            'organization' => 'II FULL DAY GERENCIA DE SISTEMAS UNT',
        ]);
    }
}
