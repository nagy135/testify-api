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
        $this->call([
            SchoolSeeder::class,
            ClassSeeder::class,
            SubjectSeeder::class,
            UserSeeder::class,
            TestSeeder::class,
            QuestionSeeder::class
        ]);
    }
}
