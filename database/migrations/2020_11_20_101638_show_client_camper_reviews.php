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
            . "r.created_at AS created_at,"
            . "r.created_by AS created_by,"
            . "clt.id AS id_clients,"
            . "clt.client_name AS name,"
            . "clt.client_last_name AS last_name,"
            . "clt.photo AS photo, "
            . "camp.image AS camper_image, "
            . " camp.camper_name AS camper_name"
            . " FROM camper_reviews r, campers camp, clients clt"
            . " WHERE "
            . " r.id_campers = camp.id"
            . " AND r.created_by = clt.id"
            . " AND camp.id_clients = clt.id ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_review_camper_client');
    }
}
