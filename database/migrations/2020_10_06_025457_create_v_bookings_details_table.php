<?php

use Illuminate\Database\Migrations\Migration;

class CreateVBookingsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE  VIEW `v_bookings_details`  AS  select `b`.`id` AS `id`,`b`.`start_date` AS `start_date`,`b`.`end_date` AS `end_date`,(to_days(`b`.`end_date`) - to_days(`b`.`start_date`)) AS `bookingDay`,`b`.`total` AS `total`,`b`.`status_booking` AS `status_booking`,`b`.`status_billings` AS `status_billings`,`ca`.`label_en` AS `camper_name_en`,`ca`.`label_de` AS `camper_name_de`,`ca`.`label_fr` AS `camper_name_fr`,`e`.`image` AS `image`,`e`.`price_per_day` AS `price_per_day`,`co`.`id` AS `owner_id`,`co`.`client_name` AS `owner_name`,`co`.`client_last_name` AS `owner_last_name`,`cr`.`id` AS `renter_id`,`cr`.`client_name` AS `renter_name`,`cr`.`client_last_name` AS `renter_last_name`,`com`.`rate` AS `commissions_rate`,`p`.`rate` AS `promotion_rate` from ((((((`bookings` `b` left join `commissions` `com` on((`com`.`id` = `b`.`id_commissions`))) left join `promotions` `p` on((`p`.`id` = `b`.`id_promotions`))) left join `campers` `e` on((`e`.`id` = `b`.`id_campers`))) left join `clients` `co` on((`co`.`id` = `b`.`id_clients`))) left join `clients` `cr` on((`cr`.`id` = `b`.`id_clients`))) left join `camper_names` `ca` on((`ca`.`id` = `e`.`id_camper_names`)))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW v_bookings_details");
    }
}
