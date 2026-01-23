<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
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
            'email' => fake()->optional()->safeEmail(),
            'phone' => '0' . fake()->numberBetween(900000000, 999999999),
            'subject' => fake()->optional()->sentence(),
            'message' => fake()->paragraph(),
            'status' => fake()->randomElement(['unread', 'read']),
        ];
    }

    /**
     * Indicate that the contact is unread.
     */
    public function unread(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'unread',
        ]);
    }

    /**
     * Indicate that the contact has been read.
     */
    public function read(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'read',
        ]);
    }
}
