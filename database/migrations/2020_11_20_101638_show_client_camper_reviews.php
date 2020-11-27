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
        DB::statement("CREATE OR REPLACE VIEW `v_review_camper_client` AS select `r`.`id` AS `id_review`,`r`.`comment` AS `comment`,`r`.`created_at` AS `created_at`,`clt`.`id` AS `id_renters`,`clt`.`client_name` AS `name`,`clt`.`client_last_name` AS `last_name`,`clt`.`photo` AS `photo`,`camp`.`id_clients` AS `id_owners`,`camp`.`image` AS `camper_image`,`camp`.`camper_name` AS `camper_name` from ((`camper_reviews` `r` join `campers` `camp`) join `clients` `clt`) where ((`r`.`id_campers` = `camp`.`id`) and (`r`.`id_clients` = `clt`.`id`)) ;");
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
