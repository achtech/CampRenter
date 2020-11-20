<?php

use Illuminate\Database\Migrations\Migration;

class ShowClientCamperReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("create or replace view v_review_camper_client as "
            . " SELECT "
            . "r.id AS id,"
            . "r.comment AS comment,"
            . "clt.id AS id_clients,"
            . "clt.client_name AS name,"
            . "clt.client_last_name AS last_name,"
            . "camp.image AS camper_image"
            . "a.image AS image"
            . " FROM camper_reviews r, campers camp, clients clt, avatar a"
            . " WHERE "
            . " r.id_campers = camp.id"
            . " AND r.id_created_by = clt.id"
            . " AND clt.id_avatars = a.id"
            . " AND camp.id_clients = clt.id ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
