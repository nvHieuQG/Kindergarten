<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Cơ sở ' . $this->faker->city,
            'address' => $this->faker->address,
            'phone' => '0' . $this->faker->numerify('#########'),
            'email' => $this->faker->companyEmail,
            'map_link' => 'https://maps.google.com/?q=' . $this->faker->latitude . ',' . $this->faker->longitude,
            'order' => $this->faker->numberBetween(1, 10),
            'status' => true,
        ];
    }

    /**
     * Indicate that the branch is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => false,
        ]);
    }
}
