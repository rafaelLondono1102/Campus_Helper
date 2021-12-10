<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReportsForumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reports')->insert([
            [
                'description'=>'no me gusto esta pregunta',
                'user_id'=> 1,
                'forum_id'=> 1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'description'=>'esta pregunta contiene insultos a mi persona',
                'user_id'=> 2,
                'forum_id'=> 1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'description'=>'esta pregunta ya fue respondida',
                'user_id'=> 2,
                'forum_id'=> 1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
        ]);
    }
}
