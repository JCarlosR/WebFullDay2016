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

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SpeakersTableSeeder::class);
        $this->call(PapersTableSeeder::class);
        $this->call(ItineraryTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(CertificateTableSeeder::class);
        $this->call(SolicitudesTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
    }
}
