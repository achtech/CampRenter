<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VWalletOwner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("create or replace view v_wallet_owner as " 
        . " SELECT "
        . "count(b.id) as total, "
        . "b.id_booking_status as bstatus, "
        . "c.id_clients as clt "
        . "FROM bookings b, campers c"
        . " WHERE"
        . " b.id_campers = c.id "
        . " group by c.id_clients,b.id_booking_status");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_wallet_owner');
    }
}
