<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('answers')->insert([
            [
               'user_id' => 1,
               'forum_id' => 1,
               'answer' => "Esto es un comentario desde el seeder para el foro 1"
            ],
            [
                'user_id' => 2,
                'forum_id' => 3,
                'answer' => "No se puede, lo siento, ellos nacen tristes"
            ]
       ]) ;
    }
}
