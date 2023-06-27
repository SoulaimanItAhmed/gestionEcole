<?php

namespace Database\Factories;

use App\Models\Eleve;
use App\Models\Matiere;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'eleve_id' => Eleve::factory(),
            'matiere_id' => Matiere::factory(),
            'note' =>fake()->numberBetween(0, 20),
        ];
    }
}
