<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //Enlazar el modelo 'Product' a la factory
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            // retornar datos automaticamente generados
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'base_price' => $this->faker->randomFloat(4, 1, 10000),
            'base_cost' => $this->faker->randomFloat(4, 1, 10000),
            'category_id' => Category::factory()
        ];
    }
}
