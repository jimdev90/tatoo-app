<?php

namespace Database\Factories;

use App\Models\Tatuador;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tatuador>
 */
class TatuadorFactory extends Factory
{
    protected $model = Tatuador::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombres' => fake()->name . ' ' . fake()->lastName,
            'dni' => fake()->creditCardNumber
        ];
    }
}
