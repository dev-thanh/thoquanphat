<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryBeautifulHouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_beautiful_house', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_category')->unsigned();
            $table->bigInteger('id_beautiful_house')->unsigned();
            $table->foreign('id_category')
                ->references('id')->on('categories')
                ->onDelete('cascade');
            $table->foreign('id_beautiful_house')
                ->references('id')->on('beautiful_house')
                ->onDelete('cascade');
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
        Schema::dropIfExists('category_beautiful_house');
    }
}
