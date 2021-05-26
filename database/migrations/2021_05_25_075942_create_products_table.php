<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100); // VARCHAR 100
            $table->text('description')->nullable(); // TEXT NULL
            $table->decimal('price', 5, 2); 
            $table->enum('size', ['XS', 'S', 'M', 'L', 'XL']); 
            $table->enum('status', ['published', 'unpublished'])->default('unpublished');
            $table->enum('state', ['sale', 'standard'])->default('standard');
            $table->string('reference', 16)->unique();
            $table->string('picture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
