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
<<<<<<< HEAD
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
=======
        $this->call(SpeakersTableSeeder::class);
        $this->call(PapersTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
>>>>>>> 054cd34ec72812cab89adf5f2ee1f5bcba90c1b6
    }
}
