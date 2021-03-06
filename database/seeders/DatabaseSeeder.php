<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(LandmarksSeeder::class);
        $this->call(ForumsSeeder::class);
        $this->call(AnswersSeeder::class);
        $this->call(EventsSeeder::class);
        $this->call(ReportsForumsSeeder::class);
        $this->call(ReportsAnswersSeeder::class);
    }
}
