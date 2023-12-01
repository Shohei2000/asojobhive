<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClassesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'class_name' => $this->faker->randomElement([
                '情報工学科',
                'ポップカルチャー',
                '人工知能科',
            ]),
        ];
    }
}
