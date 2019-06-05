<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->default('prag-shop');
            $table->string('firstImage')->default('../img/slides/img-slide.jpeg');
            $table->string('secondImage')->default('../img/slides/img-slide2.jpeg');
            $table->string('thirdImage')->default('../img/slides/img-slide4.jpeg');
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
        Schema::dropIfExists('settings');
    }
}
