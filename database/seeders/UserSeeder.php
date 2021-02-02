<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'first_name' => 'Viktor', 
           'last_name' => 'Teacher', 
           'email' => 'teacher@gmail.com',
           'password' => Hash::make('asdfasdf'),
           'teacher' => true
        ]);

        User::create([
           'first_name' => 'Bublinka', 
           'last_name' => 'Student', 
           'email' => 'student@gmail.com',
           'password' => Hash::make('asdfasdf'),
           'teacher' => false,
           'class_id' => 1
        ]);
    }
}
