<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product; //tenemso que aniadir esto para dentro de este seeder usar x modelo



class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Decirle al ProductSeeder que use el modelo Product y su funcion de factory para generar 10 suppliers
        Product::factory()->count(10)->create();
    }
}
