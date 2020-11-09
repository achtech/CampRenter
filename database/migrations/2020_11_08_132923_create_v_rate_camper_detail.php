<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVRateCamperDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE OR REPLACE VIEW `v_rate_camper_detail`  AS  SELECT (SUM(`camper_reviews`.`rate_service`)/(COUNT(`camper_reviews`.`id_campers`))) AS `ratingService`, (SUM(`camper_reviews`.`rate_managing`)/(COUNT(`camper_reviews`.`id_campers`))) AS `ratingManaging`, (SUM(`camper_reviews`.`rate_cleanliness`)/(COUNT(`camper_reviews`.`id_campers`))) AS `ratingCleanliness`, `camper_reviews`.`id_campers` AS `id_campers` FROM `camper_reviews` GROUP BY `camper_reviews`.`id_campers`");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_rate_camper_detail');
    }
}
