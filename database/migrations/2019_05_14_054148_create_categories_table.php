<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
<<<<<<< HEAD
            $table->string('image')->default('../imgCategory/default_img.jpg');
            $table->string('url');
=======
            $table->string('image')->nullable();
            $table->string('url')->nullable();
>>>>>>> 9c5e5c8a629d9b64a0eac0ac2d10143967c9f92d
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
        Schema::dropIfExists('categories');
    }
}
