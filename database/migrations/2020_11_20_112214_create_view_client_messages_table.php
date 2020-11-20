<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewClientMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("create or replace view view_client_messages as "
        . " SELECT "
        . "renter.id AS renter_id,"
        . "owner.id AS owner_id,"
        . "cltMsg.id AS id,"
        . "CONCAT(renter.client_last_name,renter.client_name) AS renter_name,"
        . "CONCAT(owner.client_last_name,owner.client_name) AS owner_name,"
        . "renter.photo AS renter_photo,"
        . "owner.photo AS owner_photo,"
        . "cltMsg.message AS message,"
        . "cltMsg.status AS status"
        . " FROM client_messages cltMsg, clients owner,clients renter"
        . " WHERE "
        . " cltMsg.id_owner = owner.id "
        . " AND cltMsg.id_renter = renter.id ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_client_messages');
    }
}
