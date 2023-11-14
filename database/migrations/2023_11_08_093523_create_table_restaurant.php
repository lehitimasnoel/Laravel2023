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
        Schema::create('restaurant', function (Blueprint $table) {
            $table->id(); // Auto-incremental ID
            $table->string('name'); // Restaurant name
            $table->string('address'); // Restaurant address
            $table->text('description')->nullable(); // Restaurant description (nullable)
            $table->decimal('rating', 3, 2)->default(0.00); // Restaurant rating with default value
            $table->timestamps(); // Created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant');
    }
};
