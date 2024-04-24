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
        //Schema::connection('second_db')->create('users', function (Blueprint $table) {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); //nullable por el QCrud
            $table->string('last_name')->nullable(); //nullable por el QCrud
            $table->string('password')->nullable(); //nullable por el QCrud
            $table->string('email', 255)->unique();
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles'); // Assuming you have a 'roles' table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
