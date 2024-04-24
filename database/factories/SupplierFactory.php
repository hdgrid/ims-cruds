<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Supplier;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    //Enlazar el modelo 'Supplier' a la factory
    protected $model = Supplier::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // retornar datos automaticamente generados
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'contact_phone' => $this->faker->phoneNumber()
        ];
    }
}
