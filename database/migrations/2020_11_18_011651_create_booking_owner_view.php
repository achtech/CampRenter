<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateBookingOwnerView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("create or replace view v_bookings_owner as "
            . " SELECT "
            . "b.id AS id,"
            . "clt.id AS id_renters,"
            . "c.id_clients AS id_owners,"
            . "clt.id_avatars,"
            . "b.id_campers,"
            . "bs.id AS booking_status_id,"
            . "b.start_date,"
            . "b.end_date,"
            . "b.status_billings,"
            . "b.commission as commission,"
            . "DATE_FORMAT(b.created_at, '%e-%c-%Y') AS created_date,"
            . "DATE_FORMAT(b.created_at, '%H:%i') AS created_hour,"
            . "DATEDIFF(b.end_date, b.start_date) AS nbr_days, "
            . "bs.label_en AS booking_status_en,"
            . "bs.label_de AS booking_status_de,"
            . "bs.label_fr AS booking_status_fr,"
            . "c.camper_name,"
            . "c.image AS camper_image,"
            . "c.price_per_day AS price,"
            . "c.camper_status,"
            . "clt.client_name,"
            . "clt.client_last_name,"
            . "clt.telephone,"
            . "clt.telephone_code,"
            . "clt.email,"
            . "a.image "
            . " FROM "
            . " bookings b,"
            . " campers c,"
            . " clients clt,"
            . " booking_status bs,"
            . " avatars a"
            . " WHERE "
            . " b.id_clients = clt.id "
            . " AND b.id_campers = c.id "
            . " AND b.id_booking_status = bs.id "
            . " AND a.id = clt.id_avatars"
        );
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_booking_owner');
    }
}
