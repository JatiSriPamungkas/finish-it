<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'        => fake()->randomElement([
                'Setup Database',
                'Create Button',
                'Setup Cloud',
            ]),
            'description' => fake()->paragraph(),
            'due_date'    => fake()->dateTimeBetween('now', '+30 days'),
            "project_id"  => fake()->numberBetween(1, 3),
            "status_id"   => fake()->numberBetween(1, 3),
            "priority_id" => fake()->numberBetween(1, 4),
            "user_id"     => fake()->numberBetween(1, 21),
        ];
    }
}
