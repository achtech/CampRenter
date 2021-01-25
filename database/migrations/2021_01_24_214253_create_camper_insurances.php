<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamperInsurances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camper_insurances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_campers')->nullable();
            $table->unsignedBigInteger('id_insurance_extra')->nullable();
            $table->foreign('id_campers')->references('id')->on('campers');
            $table->foreign('id_insurance_extra')->references('id')->on('insurance_extra');
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
        Schema::dropIfExists('camper_insurances');
    }
}
