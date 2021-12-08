<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=> 'Juanita',
                'lastname'=>'Buriticá',
                'email'=>'juanita.buriticaro@autonoma.edu.co',
                'password'=> Hash::make('hola123'),
                'type'=>'admin',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=> 'Hernando',
                'lastname'=>'Pinzon',
                'email'=>'hernando.nunezp@autonoma.edu.co',
                'password'=> Hash::make('12345678'),
                'type'=>'admin',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=> 'Rafael',
                'lastname'=>'Londoño',
                'email'=>'rafael.londonob@autonoma.edu.co',
                'password'=> Hash::make('hola123'),
                'type'=>'admin',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=> 'Lola',
                'lastname'=>'Lolita',
                'email'=>'lola@correo.com',
                'password'=> Hash::make('hola123'),
                'type'=>'student',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=> 'Pepito',
                'lastname'=>'perez',
                'email'=>'pepe@correo.com',
                'password'=> Hash::make('hola123'),
                'type'=>'worker',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
        ]);
    }
}
