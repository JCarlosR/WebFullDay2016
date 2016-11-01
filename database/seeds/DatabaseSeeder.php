<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SpeakersTableSeeder::class);
        $this->call(PapersTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
    }
}
