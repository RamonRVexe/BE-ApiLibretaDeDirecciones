<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contacto;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contacto>
 */
class ContactoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Contacto::class;

    public function definition(): array
    {
        return [
           'nombre' => $this->faker->name,
            'notas' => $this->faker->sentence,
            'fecha_cumpleanos' => $this->faker->date,
            'pagina_web' => $this->faker->url,
            'empresa' => $this->faker->company,
        ];
    }
}
