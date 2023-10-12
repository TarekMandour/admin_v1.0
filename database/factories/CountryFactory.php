<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_ar' => 'السعودية',
            'nationality_ar' => 'سعودي',
            'title_en' => 'saudi arabia',
            'nationality_en' => 'saudi arabian',
        ];
    }
}
