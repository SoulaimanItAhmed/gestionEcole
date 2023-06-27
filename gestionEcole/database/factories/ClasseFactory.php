<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classe>
 */
class ClasseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' =>fake()->randomElement(['WEB FULL STACK', 'APPLICATION MOBILE', 'GENIE ELECTRIQUE', 'GESTION']),
            'niveau' =>fake()->numberBetween(1, 2)
        ];
    }
}
