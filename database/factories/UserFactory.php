<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'mobile' => fake()->unique()->phoneNumber(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'national_code' => fake()->unique()->countryCode(),
            'wallet' => rand(2,100),
            'mobile' => fake()->unique()->phoneNumber(),
            'email_verified_at' => now(),
            'password' => bcrypt(12), // password
            'remember_token' => Str::random(10),
        ];
    }
}
