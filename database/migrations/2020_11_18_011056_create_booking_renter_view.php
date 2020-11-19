<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingRenterView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("create or replace view v_bookings_renter as select "
        ."b.id as id ,c.camper_name , b.start_date, b.end_date, c.price_per_day as price, b.status_billings, bs.label_en as booking_status_en, bs.label_de  as booking_status_de, bs.label_fr  as booking_status_fr,bs.id  as booking_status_id, c.camper_status, clt.client_name, clt.client_last_name, clt.telephone, clt.telephone_code, clt.email, clt.id as id_clients, clt.id_avatars, a.image "
        ."from bookings b, campers c, clients clt, booking_status bs, avatars a "
        ." where c.id_clients = clt.id and b.id_campers=c.id and b.id_booking_status=bs.id and a.id=clt.id_avatars");
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_booking_renter');
    }
}
