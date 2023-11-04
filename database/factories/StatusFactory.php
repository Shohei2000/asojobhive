<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status_name' => $this->faker->randomElement([
                '連絡待ち',
                '1次面接予定',
                '2次面接予定',
                '3次面接予定',
                '1次面接結果待ち',
                '2次面接結果待ち',
                '3次面接結果待ち',
                '内定',
            ]),
        ];
    }
}