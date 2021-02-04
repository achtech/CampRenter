<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class VCamperStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("create or replace view v_camper_status as"
            . " SELECT "
            . "b.id_campers as CamperId,"
            . "b.id_booking_status as bstatus, b.id as bookingId, bs.id as bookingStatusId,bs.label_de,bs.label_en,bs.label_fr FROM  bookings b, booking_status bs  where b.id_booking_status= bs.id and b.start_date<=CURDATE() and end_date >= CURDATE()");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_camper_status');
    }
}
