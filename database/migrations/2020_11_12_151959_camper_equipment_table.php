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
            $table->integer('sleeping_spots')->nullable();
            $table->boolean('is_power_supply_exist');
            $table->boolean('is_burner_stove_exist');
            $table->boolean('is_fridge_exist');
            $table->boolean('is_sink_exist');
            $table->boolean('is_indoor_table_exist');
            $table->boolean('is_cd_player_exist');
            $table->boolean('is_dishes_exist');
            $table->boolean('is_camping_table_exist');
            $table->boolean('is_camping_chairs_exist');
            $table->boolean('is_trailer_hitch_exist');
            $table->boolean('is_water_tank_exist');
            $table->boolean('is_gas_cooker_exist');
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
