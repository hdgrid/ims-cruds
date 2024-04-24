<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Decirle al CategorySeeder que use el modelo Category y su funcion de factory para generar 10 categories
        Category::factory()->count(10)->create();
    }
}
