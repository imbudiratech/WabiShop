<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {

            $table->id();

            // Product name
            $table->string('post');

            // Product image
            $table->string('image');

            // Product price
            $table->decimal('price', 10, 2);

            // Category relationship
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();

            // Admin who uploaded the product
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};