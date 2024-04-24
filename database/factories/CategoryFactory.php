<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //Enlazar el modelo 'Category' a la factory
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            // retornar datos automaticamente generados
            'name' => $this->faker->word()
        ];
    }
}
