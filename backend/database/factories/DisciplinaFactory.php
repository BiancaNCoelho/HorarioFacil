<?php

namespace Database\Factories;

use App\Models\Disciplina;
use Illuminate\Database\Eloquent\Factories\Factory;

class DisciplinaFactory extends Factory
{
    protected $model = Disciplina::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->word,
            'codigo' => $this->faker->unique()->randomNumber(5, true),
            'carga_horaria' => $this->faker->numberBetween(2, 6),
        ];
    }
}