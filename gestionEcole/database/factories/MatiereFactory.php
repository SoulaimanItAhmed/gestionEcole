<?php

namespace Database\Factories;

use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matiere>
 */
class MatiereFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom'=>fake()->randomElement(['PHP', 'lARAVEL', 'REACT', 'JAVASCRIPT', 'NODEJS', 'MONGODB', 'MYSQL', 'HTML', 'CSS', 'BOOTSTRAP']),
            'enseignant_id' => Enseignant::factory(),
        ];
    }
}
