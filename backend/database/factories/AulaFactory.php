<?php

namespace Database\Factories;

use App\Models\Aula;
use App\Models\Disciplina;
use Illuminate\Database\Eloquent\Factories\Factory;


class AulaFactory extends Factory
{
    protected $model = Aula::class;

    public function definition()
    {
        return [
            'sala' => $this->faker->randomNumber(3),
            'horario_inicio' => $this->faker->time('H:i:s'),
            'disciplina_id' => function () {
                return Disciplina::factory()->create()->id;
            },
            'semana' => json_encode(['segunda', 'terça', 'quarta', 'quinta', 'sexta']),
            'predio' => $this->faker->word,
            'turma' => $this->faker->word,
        ];
    }
}