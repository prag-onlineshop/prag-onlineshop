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
            $table->bigIncrements('id');
<<<<<<< HEAD
            $table->integer('category_id');
            $table->integer('brand_id');
=======
            $table->integer('category_id')->nullable();
            $table->integer('brand_id')->nullable();
>>>>>>> b6cdcc45661bd85d070ff971a2d8b908a3c3b235
            $table->string('name');
            $table->string('image');
            $table->integer('price');
            $table->string('description');
            $table->integer('quantity');
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
