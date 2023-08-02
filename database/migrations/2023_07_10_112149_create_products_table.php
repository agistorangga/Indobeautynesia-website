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
            $table->id()->autoIncrement();
            $table->integer('category_id');
            $table->integer('promo_id')->nullable();
            $table->integer('brand_id');
            $table->boolean('is_bundle');
            $table->string('name');
            $table->string('subtitle')->nullable();
            $table->string('price');
            $table->text('description')->nullable();
            $table->text('how_to_use')->nullable();
            $table->text('ingredients')->nullable();
            $table->string('size')->nullable();
            $table->string('photo')->nullable();
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