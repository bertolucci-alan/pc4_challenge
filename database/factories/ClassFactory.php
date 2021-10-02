<?php

namespace Database\Factories;

use App\Models\Classes;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Classes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'school_id' => $this->faker->randomDigit(),
            'year' => $this->faker->year($max = 'now'),
            'grade' => $this->faker->randomDigit(),
            'level' => $this->faker->optional($default = 'elementary')->word,
            'day' => $this->faker->optional($default = 'moornign')->word,
        ];
    }
}