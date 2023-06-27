<?php

namespace Database\Factories;

use App\Models\Classe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eleve>
 */
class EleveFactory extends Factory
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
            'date_de_naissance'=>fake()->dateTimeBetween('1999-01-01','2004-01-01'),
            'adresse'=>fake()->address(),
            'telephone'=>fake()->phoneNumber(),
            'classe_id' => Classe::factory(),
            'user_id' => User::factory()
        ];
    }
}
