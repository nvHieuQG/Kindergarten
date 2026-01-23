<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_name' => fake()->name(),
            'parent_email' => fake()->unique()->safeEmail(),
            'parent_phone' => '0' . fake()->numberBetween(900000000, 999999999),
            'child_name' => fake()->firstName() . ' ' . fake()->lastName(),
            'child_dob' => fake()->dateTimeBetween('-6 years', '-2 years'),
            'child_gender' => fake()->randomElement(['male', 'female']),
            'address' => fake()->address(),
            'program' => fake()->randomElement(['Nhà trẻ', 'Mẫu giáo bé', 'Mẫu giáo nhỡ', 'Mẫu giáo lớn']),
            'preferred_start_date' => fake()->dateTimeBetween('now', '+3 months'),
            'message' => fake()->optional()->paragraph(),
            'status' => fake()->randomElement(['pending', 'reviewing', 'approved', 'rejected']),
            'admin_notes' => fake()->optional()->sentence(),
        ];
    }

    /**
     * Indicate that the enrollment is pending.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
        ]);
    }

    /**
     * Indicate that the enrollment is approved.
     */
    public function approved(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'approved',
            'admin_notes' => 'Đã duyệt đơn đăng ký.',
        ]);
    }

    /**
     * Indicate that the enrollment is reviewing.
     */
    public function reviewing(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'reviewing',
        ]);
    }

    /**
     * Indicate that the enrollment is rejected.
     */
    public function rejected(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'rejected',
            'admin_notes' => 'Không đủ điều kiện.',
        ]);
    }
}
