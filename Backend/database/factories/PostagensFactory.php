<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Postagens>
 */
class PostagensFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titulo = $this->faker->unique()->sentence();
        return [
           'titulo' => $titulo,
           'descricao' => $this->faker->paragraph(),
           'slug'=> Str::slug($titulo),
           'imagem' => $this->faker->imageUrl(400,400),
           'id_user' => User::pluck('id')->random(),
           'id_categoria'=> Categoria::pluck('id')->random(),
        ];
    }
}
