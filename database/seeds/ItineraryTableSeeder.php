<?php

use App\Itinerarie;
use Illuminate\Database\Seeder;

class ItineraryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Itinerarie::create([
            'type' => 1,
            'description' => 'Control de Asitencia',
            'start' => '08:00:00',
            'end' => '08:30:00',
            'enable' => 1,
        ]);

        Itinerarie::create([
            'type' => 2,
            'description' => 'Apertura',
            'start' => '08:30:00',
            'end' => '09:00:00',
            'enable' => 1,
        ]);

        Itinerarie::create([
            'type' => 3,
            'description' => 'Ponencia A',
            'start' => '09:00:00',
            'end' => '10:00:00',
            'enable' => 1,
        ]);

        Itinerarie::create([
            'type' => 3,
            'description' => 'Ponencia B',
            'start' => '10:00:00',
            'end' => '11:00:00',
            'enable' => 1,
        ]);

        Itinerarie::create([
            'type' => 4,
            'description' => 'BREAK',
            'start' => '11:00:00',
            'end' => '11:30:00',
            'enable' => 1,
        ]);

        Itinerarie::create([
            'type' => 3,
            'description' => 'Ponencia C',
            'start' => '11:30:00',
            'end' => '12:30:00',
            'enable' => 1,
        ]);

        Itinerarie::create([
            'type' => 4,
            'description' => 'Sorteo',
            'start' => '12:30:00',
            'end' => '12:45:00',
            'enable' => 1,
        ]);

        Itinerarie::create([
            'type' => 4,
            'description' => 'Almuerzo',
            'start' => '12:45:00',
            'end' => '14:15:00',
            'enable' => 1,
        ]);

        Itinerarie::create([
            'type' => 1,
            'description' => 'Control de Asitencia',
            'start' => '14:15:00',
            'end' => '14:30:00',
            'enable' => 1,
        ]);

        Itinerarie::create([
            'type' => 3,
            'description' => 'Ponencia D',
            'start' => '14:30:00',
            'end' => '15:30:00',
            'enable' => 1,
        ]);

        Itinerarie::create([
            'type' => 3,
            'description' => 'Ponencia E',
            'start' => '15:30:00',
            'end' => '16:30:00',
            'enable' => 1,
        ]);

        Itinerarie::create([
            'type' => 4,
            'description' => 'BREAK',
            'start' => '16:30:00',
            'end' => '17:00:00',
            'enable' => 1,
        ]);

        Itinerarie::create([
            'type' => 3,
            'description' => 'Ponencia F',
            'start' => '17:00:00',
            'end' => '18:00:00',
            'enable' => 1,
        ]);

        Itinerarie::create([
            'type' => 2,
            'description' => 'Cierre y Sorteos',
            'start' => '18:00:00',
            'end' => '18:30:00',
            'enable' => 1,
        ]);
    }
}
