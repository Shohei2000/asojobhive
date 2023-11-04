<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $faker = FakerFactory::create('ja_JP');

        return [
            'email' => $this->faker->unique()->safeEmail(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'password' => bcrypt('password'), // パスワードを固定で設定
            'first_name' => $this->faker->firstName,
            'first_name_furigana' => '',
            'last_name' => $this->faker->lastName,
            'last_name_furigana' => '',
            'birthday' => $this->faker->dateTimeBetween('-30 years', '-19 years')->format('Y-m-d'),
            'gender' => $this->faker->randomElement(['男性', '女性']),
            'phone_number' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'created_at' => $this->faker->dateTimeThisDecade,
            'updated_at' => $this->faker->dateTimeThisYear,
            'remember_token' => null,
            'class_id' => '1',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
