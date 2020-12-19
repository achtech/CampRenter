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
            $table->string('camping_table')->nullable();
            $table->string('camping_chairs')->nullable();
            $table->string('transport')->nullable();
            $table->string('water')->nullable();
            $table->string('winter')->nullable();
            $table->string('additional_equipment_outside')->nullable();
            $table->string('single_beds')->nullable();
            $table->string('double_beds')->nullable();
            $table->string('air_conditioner')->nullable();
            $table->string('heating')->nullable();
            $table->string('power')->nullable();
            $table->string('dimming')->nullable();
            $table->string('indoor_table')->nullable();
            $table->string('rotatable_seats')->nullable();
            $table->string('baby_seat')->nullable();
            $table->string('electronics')->nullable();
            $table->string('cooking_possibility')->nullable();
            $table->string('cooling_possibility')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('sink')->nullable();
            $table->string('dishes')->nullable();
            $table->string('additional_equipment_inside')->nullable();
            $table->string('other_additional_equipment')->nullable();
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
