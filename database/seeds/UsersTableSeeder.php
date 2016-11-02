<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => 1, // Master
            'name' => 'Miguel Juarez',
            'email' => 'mjuarez.mj3@gmail.com',
            'password' => bcrypt('123123')
        ]);
        User::create([
            'role_id' => 2, // Administrator
            'name' => 'Jorge Gonzales',
            'email' => 'joryes1894@gmail.com',
            'password' => bcrypt('123456')
        ]);
        User::create([
            'role_id' => 3, //Assistant
            'name' => 'Edilberto Soles',
            'email' => 'edilberto0905@gmail.com',
            'password' => bcrypt('321321')
        ]);
        User::create([
            'role_id' => 3, //Operator
            'name' => 'Eduardo Rivera',
            'email' => 'ed123@gmail.com',
            'password' => bcrypt('123123')
        ]);

    }
}
