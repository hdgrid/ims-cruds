<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Decirle al SupplierSeeder que use el modelo Supplier y su funcion de factory para generar 10 suppliers
        Supplier::factory()->count(10)->create();
    }
}
