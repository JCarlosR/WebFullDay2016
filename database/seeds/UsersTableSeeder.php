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
            'role_id' => 3, // Assistant
            'name' => 'Edilberto Soles',
            'email' => 'edilberto0905@gmail.com',
            'password' => bcrypt('3015'),
            'celular' => '937 225 841',
            'dni' => '70301505',
            'universidad' => 'UNT',
            'carrera' => 'Ingeniería de Sistemas',
            'ciclo' => 10,
            'egresado' => false
        ]);
        User::create([
            'role_id' => 2, // Operator
            'name' => 'Eduardo Rivera',
            'email' => 'ed123@gmail.com',
            'password' => bcrypt('123123')
        ]);

        User::create([
            'role_id' => 3,
            'name' => 'Juan Ramos',
            'email' => 'juancagb.17@gmail.com',
            'password' => bcrypt('123123'),
            'celular' => '966 543 777',
            'dni' => '76474871',
            'universidad' => 'UNT',
            'carrera' => 'Ingeniería de Sistemas',
            'ciclo' => 10,
            'egresado' => false
        ]);
    }
}
