<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Email;
use App\Models\Contacto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Email>
 */
class EmailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Email::class;

    public function definition(): array
    {
        return [
            'contacto_id' => Contacto::factory(),
            'email' => $this->faker->unique()->safeEmail,
            'tipo' => $this->faker->randomElement(['personal', 'trabajo']),
        ];
    }
}
