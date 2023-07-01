<?php

namespace Database\Factories;

use App\Models\Cita;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cita>
 */
class CitaFactory extends Factory
{
    protected $model = Cita::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_user' => fake()->numberBetween(1,2),
            'dni' => fake()->numberBetween(40000000, 80000000),
            'fecha' => fake()->date('Y-m-d'),
            'hora' => fake()->time('H:i:s'),
            'celular' => fake()->phoneNumber,
            'tatuador_id' => fake()->numberBetween(1,3),
        ];
    }
}
