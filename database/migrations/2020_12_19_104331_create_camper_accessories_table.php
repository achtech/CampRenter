<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamperAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camper_accessories', function (Blueprint $table) {
            $table->id();
            $table->string('paid_accessories')->nullable();
            $table->string('booking_per')->nullable();
            $table->integer('price')->nullable();
            $table->unsignedBigInteger('id_campers')->nullable();
            $table->foreign('id_campers')->references('id')->on('campers');
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
        Schema::dropIfExists('camper_accessories');
    }
}
