<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamperTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camper_terms', function (Blueprint $table) {
            $table->id();
            $table->string('season')->nullable();
            $table->integer('price_per_night')->nullable();
            $table->integer('minimum_night')->nullable();
            $table->integer('start_month')->nullable();
            $table->integer('end_month')->nullable();
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
        Schema::dropIfExists('camper_terms');
    }
}
