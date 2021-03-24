<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(20),
            'user' => $this->faker->unique()->word(20),
            'password' => '12345',
            'image_path' => 'empresas/'.$this->faker->image('public/storage/empresas',640,480, null, false),
            'endpoint' => $this->faker->url,
            'status' => '1',
        ];
    }
}
