<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVBookingCamperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("create or replace view v_booking_camper as "
        . " SELECT "
        . "b.id_clients AS id_renters,"
        . "c.id_clients AS id_owners,"
        . "b.id_booking_status as status,"
        . "b.id as id_bookings,"
        . "c.id as id_campers"
        . " FROM bookings b, campers  c"
        . " WHERE "
        . " b.id_campers = c.id ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_booking_camper');
    }
}
