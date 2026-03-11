<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectMember>
 */
class ProjectMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id"    => fake()->numberBetween(1, 21),
            "project_id" => fake()->numberBetween(1, 3),
            'role_id'    => fake()->numberBetween(1, 3),
        ];
    }
}
