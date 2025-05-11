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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('brand_id')->constrained('brands');
            $table->foreignId('provider_id')->constrained('providers');

            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('model')->nullable();
            $table->text('description')->nullable();
            $table->integer('price')->default(0);
            $table->integer('discount')->default(0);
            $table->float('rating')->default(0);
            $table->integer('quantity')->default(0);
            $table->boolean('published')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
