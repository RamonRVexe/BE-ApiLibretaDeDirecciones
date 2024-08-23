<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Direccion;
use App\Models\Contacto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Direccion>
 */
class DireccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Direccion::class;

    public function definition(): array
    {
        return [
            'contacto_id' => Contacto::factory(),
            'direccion' => $this->faker->streetAddress,
            'ciudad' => $this->faker->city,
            'estado' => $this->faker->state,
            'codigo_postal' => $this->faker->postcode,
            'pais' => $this->faker->country,
        ];
    }
}
