<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\CompanyQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyQuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyQuestion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => Company::factory(),
            'question_title' => $this->faker->sentence,
            'question_content' => $this->faker->paragraph,
        ];
    }
}
