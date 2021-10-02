<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Student;
use App\Models\Student_Class;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = Student::factory(10)->count(50)->create();
    }
}