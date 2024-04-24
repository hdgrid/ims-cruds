<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventory-logs', function (Blueprint $table) {
            $table->id();
            //$table->text('notes')->nullable();
            $table->unsignedBigInteger('inventory_id');
			$table->foreign('inventory_id')->references('id')->on('inventories')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('amount');
            $table->integer('delta_amount');
            $table->string('movement'); //maybe add CHECK constriant
            $table->unsignedBigInteger('product_id');
			$table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();

            // Commented out for relationships
             
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory-logs');
    }
};
