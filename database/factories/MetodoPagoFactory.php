<?php

namespace Database\Factories;

use App\Models\MetodoPago;
use Illuminate\Database\Eloquent\Factories\Factory;

class MetodoPagoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MetodoPago::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'clave' => $this->faker->unique()->word(10),
            'name' => $this->faker->unique()->word(10),
            'description' => $this->faker->unique()->word(30),
            'status' => '1',
        ];
    }
}
