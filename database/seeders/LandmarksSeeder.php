<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LandmarksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('landmarks')->insert([
            [
                'name'=> 'Parque de la mujer',
                'address'=>'cra 27 # 25-36',
                'description'=>'El es parque de la mujer, un parque donde va gente',
                'picture'=> null,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=> 'Universidad UAM',
                'address'=>'clle 27 # 23-36',
                'description'=>'El la universidad donde gente va a estudiar fuertemendte',
                'picture'=> null,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=> 'Tienda D1',
                'address'=>'cra 11 # 32a-36',
                'description'=>'Es una tienda d1 venden cosas muy baratas y pizzas muy malas',
                'picture'=> null,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
        ]);
    }
}
