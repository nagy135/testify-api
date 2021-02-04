<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\School;
use App\Models\Subject;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school = School::first();
        $subject = Subject::first();

        $teacher = User::create([
           'first_name' => 'Viktor',
           'last_name' => 'Teacher',
           'email' => 'teacher@gmail.com',
           'password' => Hash::make('asdfasdf'),
           'teacher' => true
        ]);

        $teacher->schools()->attach($school->id);
        $teacher->subjects()->attach($subject->id);

        $student = User::create([
           'first_name' => 'Bublinka',
           'last_name' => 'Student',
           'email' => 'student@gmail.com',
           'password' => Hash::make('asdfasdf'),
           'teacher' => false,
           'class_id' => 1
        ]);
        $student->schools()->attach($school->id);
        $student->subjects()->attach($subject->id);

        // create superadmin
        User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'superadmin@testify.com',
            'password' => Hash::make('asdfasdf'),
        ]);
    }
}
