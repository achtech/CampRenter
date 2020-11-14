<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CamperRentalTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camper_rental_terms', function (Blueprint $table) {
            $table->id();
            $table->string('included_kilometres')->nullable();
            $table->boolean('is_animal_allowed');
            $table->boolean('is_smooking_allowed');
            $table->boolean('is_parking_available');
            $table->integer('minimum_age_renter')->nullable();
            $table->integer('minimum_length_driver_licence')->nullable();
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
        Schema::dropIfExists('camper_rental_terms');
    }
}
