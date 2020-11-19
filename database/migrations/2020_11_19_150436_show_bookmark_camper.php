<?php

use Illuminate\Database\Migrations\Migration;

class ShowBookmarkCamper extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("create or replace view v_bookmark_camper as "
            . " SELECT "
            . "book.id AS id,"
            . "book.id_clients AS id_clients,"
            . "camp.id AS id_campers,"
            . "camp.camper_name AS name,"
            . "camp.image AS image,"
            . "camp.description_camper AS description"
            . " FROM camper_bookmarks book, campers camp"
            . " WHERE "
            . " book.id_campers = camp.id ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_bookmark_camper');
    }
}
