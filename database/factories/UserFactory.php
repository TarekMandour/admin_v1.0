<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
use App\Models\Religion;
use App\Models\Country;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'phone' => fake()->unique()->numerify('##########'),
            'email' => fake()->unique()->email(),
            'nationality' => 'سعودي',
            'address' => fake()->address(),
            'country_id' => 1,
            'city_id' => 1,
            'branch_id' => 1,
            'password' => Hash::make('123456789'),
            'is_active' => '1',
        ];
    }
}
