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
        Schema::create('menu', function (Blueprint $table) {
            $table->id(); // Auto-incremental ID
            $table->string('name'); // Restaurant name
            $table->string('categories'); // Restaurant address
            $table->string('image'); // Restaurant address
            $table->text('description')->nullable(); // Restaurant description (nullable)
            $table->timestamps(); // Created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
