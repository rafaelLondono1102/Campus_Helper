<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'name'=> '2x1 en frisbi',
                'start_date'=> '2021-12-9',
                'end_date'=> '2021-12-15',
                'description'=> 'por un pollo lleve otro gratis',
                'landmark_id' => 1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=> 'Fiesta en la UAM',
                'start_date'=> '2021-12-10',
                'end_date'=> '2021-12-11',
                'description'=> 'se celebra que termino este martirio de semestre',
                'landmark_id' => 2,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'name'=> 'cocacola gratis en frisbi',
                'start_date'=> '2021-12-11',
                'end_date'=> '2021-12-14',
                'description'=> 'por la compra de valor de 50k lleve una cocacola familiar gratis',
                'landmark_id' => 1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            
        ]);
    }
}
