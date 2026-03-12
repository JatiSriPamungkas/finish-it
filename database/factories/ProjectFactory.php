<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
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
                'Refactor Website',
                'Redesign Mobile Apps',
                'Build a Web Management Apps',
                'API Payment Gateway',
                'Redesign Landing Page',
                'Lume Video Validator',
            ]),
            'description' => fake()->paragraph(),
            'is_active'   => fake()->boolean(),
            'due_date'    => fake()->dateTimeBetween('+1 months', '+6 months'),
        ];
    }
}
