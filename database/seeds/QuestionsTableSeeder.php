<?php

use App\Question;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Question::create([
            'description' => 'Pregunta Mañana 1',
            'turn' => 'M',
            'type' => 1,
        ]);
        Question::create([
            'description' => 'Pregunta Mañana 2',
            'turn' => 'M',
            'type' => 2,
        ]);
        Question::create([
            'description' => 'Pregunta tarde 1',
            'turn' => 'T',
            'type' => 1,
        ]);
        Question::create([
            'description' => 'Pregunta tarde 2',
            'turn' => 'T',
            'type' => 2,
        ]);
    }
}
