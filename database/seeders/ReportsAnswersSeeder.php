<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportsAnswersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('report_answers')->insert([
            [
                'description'=>'no me gusto esta respuesta',
                'user_id'=> 1,
                'answer_id'=> 1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'description'=>'esta respuesta contiene insultos a mi persona',
                'user_id'=> 2,
                'answer_id'=> 1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'description'=>'esta respuesta ya fue dada',
                'user_id'=> 2,
                'answer_id'=> 1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
        ]);
    }
}
