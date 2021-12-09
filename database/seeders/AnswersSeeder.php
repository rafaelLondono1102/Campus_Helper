<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswersSeeder extends Seeder
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
                'answer'=>'no me gusto esta respuesta',
                'user_id'=> 1,
                'forum_id'=> 1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'answer'=>'esta respuesta contiene insultos a mi persona',
                'user_id'=> 2,
                'forum_id'=> 1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'answer'=>'esta respuesta ya fue dada',
                'user_id'=> 2,
                'forum_id'=> 1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
        ]);
    }
}
