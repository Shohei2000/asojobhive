<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Company;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_name' => $this->faker->company,
            'company_name_kana' => $this->faker->kanaName,
            'representative_name' => $this->faker->name,
            'representative_position' => $this->faker->jobTitle,
            'headquarters_address' => $this->faker->address,
            'headquarters_postal_code' => $this->faker->postcode,
            'headquarters_phone' => $this->faker->phoneNumber,
            'submission_address' => $this->faker->address,
            'submission_postal_code' => $this->faker->postcode,
            'submission_phone' => $this->faker->phoneNumber,
            'recruitment_department' => $this->faker->word,
            'recruitment_contact' => $this->faker->name,
            'recruitment_contact_phone' => $this->faker->phoneNumber,
            'recruitment_contact_fax' => $this->faker->phoneNumber,
            'recruitment_contact_email' => $this->faker->email,
            'business_description' => $this->faker->paragraph,
            'established' => $this->faker->year,
            'capital' => $this->faker->randomNumber(7),
            'annual_sales' => $this->faker->randomNumber(8),
            'stocks' => $this->faker->randomNumber(5),
            'branch_count' => $this->faker->randomNumber(2),
            'office_count' => $this->faker->randomNumber(2),
            'website_url' => $this->faker->url,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
