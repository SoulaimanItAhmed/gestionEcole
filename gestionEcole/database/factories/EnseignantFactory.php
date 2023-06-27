<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enseignant>
 */
class EnseignantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom'=>fake()->lastName(),
            'prenom'=>fake()->firstName(),
            'date_de_naissance'=>fake()->dateTimeBetween('1970-01-01','1990-01-01'),
            'adresse'=>fake()->address(),
            'telephone'=>fake()->phoneNumber(),
            'user_id' => User::factory()
        ];
    }
}
