<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CamperEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camper_equipment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_campers')->nullable();
            $table->boolean('camping_table');
            $table->boolean('camping_chairs');
            $table->boolean('transport');
            $table->boolean('water');
            $table->string('winter');
            $table->boolean('additional_equipment_outside');
            $table->integer('single_beds');
            $table->integer('double_beds');
            $table->string('air_conditioner');
            $table->string('heating');
            $table->string('power');
            $table->string('dimming');
            $table->string('indoor_table');
            $table->string('rotatable_seats');
            $table->string('baby_seat');
            $table->string('electronics');
            $table->boolean('cooking_possibility');
            $table->boolean('cooling_possibility');
            $table->string('bathroom');
            $table->string('sink');
            $table->string('dishes');
            $table->string('additional_equipment_inside');
            $table->integer('sleeping_spots')->nullable();
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
        //
        Schema::dropIfExists('camper_equipment');
    }
}
