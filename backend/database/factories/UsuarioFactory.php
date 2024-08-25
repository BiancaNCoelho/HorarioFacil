<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = $this->faker;
        
        return [
            'name' => $faker->name(),
            'matricula' => $faker->unique()->numerify('#########'), // Número de 9 dígitos
            'email' => $faker->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'tipo_usuario' => $faker->randomElement(['aluno', 'professor', 'administrador']),
            'departamento' => $faker->word(),
            'curso' => $faker->word(),
            'nivel' => $faker->numberBetween(0, 2), // Ajuste o intervalo conforme seus níveis
        ];
    }

    /**
     * Estado para criar um usuário do tipo administrador.
     */
    public function administrador(): static
    {
        return $this->state(fn(array $attributes) => [
            'tipo_usuario' => 'administrador',
            'nivel' => 2, // Nível para administrador
            'password' => Hash::make('admin'), // Senha hashada
        ]);
    }

    /**
     * Estado para criar um usuário do tipo professor.
     */
    public function professor(): static
    {
        return $this->state(fn(array $attributes) => [
            'tipo_usuario' => 'professor',
            'nivel' => 1, // Nível para professor
            'password' => Hash::make('password'), // Senha hashada
        ]);
    }

    /**
     * Estado para criar um usuário do tipo aluno.
     */
    public function aluno(): static
    {
        return $this->state(fn(array $attributes) => [
            'tipo_usuario' => 'aluno',
            'nivel' => 0, // Nível para aluno
            'password' => Hash::make('password'), // Senha hashada
        ]);
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
