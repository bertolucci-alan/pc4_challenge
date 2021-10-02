<?php

namespace Database\Factories;

use App\Models\Student_Class;
use Illuminate\Database\Eloquent\Factories\Factory;

class Student_ClassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student_Class::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'student_id' => $this->faker->randomDigit(),
            'class_id' => $this->faker->randomDigit(),
        ];
    }
}