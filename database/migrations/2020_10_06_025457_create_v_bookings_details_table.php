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
        DB::statement("CREATE OR REPLACE VIEW `v_bookings_details` AS SELECT `b`.`id` AS `id`,`b`.`start_date` AS `start_date`, `b`.`end_date` AS `end_date`, ( TO_DAYS(`b`.`end_date`) - TO_DAYS(`b`.`start_date`)) AS `bookingDay`, `b`.`total` AS `total`, `b`.`commission` AS `commission`,  `b`.`status_billings` AS `status_billings`, `sb`.`label_en` AS `status_booking_en`, `sb`.`label_de` AS `status_booking_de`,  `sb`.`label_fr` AS `status_booking_fr`, `e`.`camper_name` AS `camper_name`, `e`.`id` AS `id_campers`,  `e`.`image` AS `image`, `co`.`id` AS `owner_id`, `co`.`client_name` AS `owner_name`,  `co`.`client_last_name` AS `owner_last_name`,  `cr`.`id` AS `renter_id`,  `cr`.`client_name` AS `renter_name`,  `cr`.`client_last_name` AS `renter_last_name` FROM `bookings` `b` LEFT JOIN `campers` `e` ON `e`.`id` = `b`.`id_campers`  LEFT JOIN `clients` `co` ON `co`.`id` = `b`.`id_clients`    LEFT JOIN `clients` `cr` ON `cr`.`id` = `b`.`id_clients`	LEFT JOIN `booking_status` `sb` ON `sb`.`id` = `b`.`id_booking_status`");
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
