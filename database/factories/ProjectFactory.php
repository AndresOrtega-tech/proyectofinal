<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(), // Cambiado de 'title' a 'name'
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['planning', 'in_progress', 'completed', 'on_hold']),
            'start_date' => $this->faker->dateTimeBetween('-1 month', '+1 week'),
            'end_date' => $this->faker->dateTimeBetween('+1 week', '+3 months'),
            'owner_id' => function () {
                // Crear un usuario si no existe ninguno
                return User::factory()->create()->user_id;
            }
        ];
    }
}