<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Enseignant;
use App\Models\Matiere;
use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(5)->create();
        Classe::factory(5)->create();
        $eleves = Eleve::factory((5))->create();

        Matiere::factory(5)->create()->each(function ($matiere) use ($eleves) {
            $matiere->eleves()->attach($eleves, ['note' => fake()->randomFloat(2, 0, 20)]);
        });
    }
}
