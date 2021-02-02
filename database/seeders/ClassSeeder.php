<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CClass;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CClass::create([
            'name' => '2C'
        ]);
    }
}
