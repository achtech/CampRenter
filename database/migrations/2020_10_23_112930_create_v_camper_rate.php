<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVCamperRate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE OR REPLACE VIEW  v_rate_camper as  SELECT sum(`rate_service`+`rate_managing`+`rate_cleanliness`)/(count(id_campers)*3) as rate, id_campers FROM `camper_reviews` GROUP by id_campers");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_camper_rate');
    }
}
