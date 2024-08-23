<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Telefono;
use App\Models\Contacto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Telefono>
 */
class TelefonoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Telefono::class;

    public function definition(): array
    {
        return [
            'contacto_id' => Contacto::factory(),
            'numero' => $this->faker->phoneNumber,
            'tipo' => $this->faker->randomElement(['casa', 'trabajo', 'móvil']),
        ];
    }
}
