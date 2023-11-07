<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
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
        $full_name = $this->faker->name();
        $name = explode(' ', $full_name)[0];
        $symbolicCode = str_replace(' ', '_', strtolower($full_name));

        return [
            'name' => $name,
            'full_name' => $full_name,
            'symbolic_code' => $symbolicCode,
            'phone' => fake()->phoneNumber(), // добавленное поле "phone"
            'status' => $this->faker->randomElement(['Active', 'Blocked']),
            'description' => $this->faker->paragraph,
            'job' => $this->faker->randomElement([
                'Sales Director', 'Sales Manager',
                'Key account manager', 'Purchasing specialist',
                'Sales representative', 'Marketing Manager',
                'Sales Analyst', 'Logistics coordinator',
                'Commercial director', 'Financial analyst',
                'Customer Service Specialist', 'Technical specialist',
                'Sales assistant', 'Seller'
            ]),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
