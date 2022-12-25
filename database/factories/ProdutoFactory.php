<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nome" => $this->faker->name(),
            "descricao" => $this->faker->text(),
            "imagem" => "0c45015199d9620460aa268536c6b8bb.png",
            "preco" => 199.00
        ];
    }
}
