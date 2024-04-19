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
            'title' => $this->faker->sentence(3),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'phase' => $this->faker->randomElement(['design', 'development', 'testing', 'deployment', 'complete']),
            'description' => $this->faker->paragraph(),
            'uid'=> 1
        ];
    }
}
