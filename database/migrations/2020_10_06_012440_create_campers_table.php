<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campers', function (Blueprint $table) {
            $table->id();
            $table->string('image', 50)->nullable();
            $table->string('brand', 100)->nullable();
            $table->string('model', 100)->nullable();
            $table->string('value_of_vehicule', 100)->nullable();
            $table->string('license_plate_number', 100)->nullable();
            $table->string('seat_number', 100)->nullable();
            $table->integer('sleeping_places')->nullable();
            $table->string('vehicle_licence', 100)->nullable();
            $table->string('length', 100)->nullable();
            $table->string('width', 100)->nullable();
            $table->string('height', 100)->nullable();
            $table->string('description_camper', 300)->nullable();
            $table->string('location', 100)->nullable();
            $table->double('price_per_day')->nullable();
            $table->integer('minimal_rent_days')->nullable();
            $table->bigInteger('included_kilometres')->nullable();
            $table->integer('minimum_age')->nullable();
            $table->string('animals_allowed')->nullable();
            $table->string('animal_description', 300)->nullable();
            $table->string('licence_needed_desc', 100)->nullable();
            $table->string('licence_needed', 100)->nullable();
            $table->string('license_age', 100)->nullable();
            $table->string('licence_age_desc', 300)->nullable();
            $table->string('smoking_allowed', 100)->nullable();
            $table->string('availability', 100)->nullable();
            $table->string('is_confirmed', 100)->nullable();

            $table->unsignedBigInteger('id_clients')->nullable();
            $table->unsignedBigInteger('id_camper_names')->nullable();
            $table->unsignedBigInteger('id_licence_categories')->nullable();
            $table->unsignedBigInteger('id_camper_categories')->nullable();
            $table->unsignedBigInteger('id_transmissions')->nullable();
            $table->unsignedBigInteger('id_fuels')->nullable();

            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');

            $table->foreign('id_clients')->references('id')->on('clients');
            $table->foreign('id_camper_names')->references('id')->on('camper_names');
            $table->foreign('id_licence_categories')->references('id')->on('licence_categories');
            $table->foreign('id_camper_categories')->references('id')->on('camper_categories');
            $table->foreign('id_transmissions')->references('id')->on('transmissions');
            $table->foreign('id_fuels')->references('id')->on('fuels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campers');
    }
}
