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
                'Create Button',
                'Setup Cloud',
                'Setup Database Migrations',
                'Integrasi API Payment Gateway',
                'Slicing UI Dashboard',
                'Optimasi Query Database',
                'Fixing Bug Login Session',
                'Research User Experience',
                'Deploy ke Server Production',
                'Penulisan Dokumentasi API',
                'Unit Testing Feature X',
                'Refactoring Code Base',
            ]),
            'description' => fake()->paragraph(),
            'due_date'    => fake()->dateTimeBetween('now', '+30 days'),
            "project_id"  => fake()->numberBetween(1, 6),
            "status_id"   => fake()->numberBetween(1, 3),
            "priority_id" => fake()->numberBetween(1, 4),
            "user_id"     => fake()->numberBetween(1, 51),
        ];
    }
}
