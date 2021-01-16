<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateBookingOwnerView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE OR REPLACE VIEW `v_bookings_owner` AS SELECT
        `b`.`id` AS `id`,
        `clt`.`id` AS `id_renters`,
        `c`.`id_clients` AS `id_owners`,
        `clt`.`id_avatars` AS `id_avatars`,
        `b`.`id_campers` AS `id_campers`,
        `bs`.`id` AS `booking_status_id`,
        `b`.`start_date` AS `start_date`,
        `b`.`end_date` AS `end_date`,
        `b`.`status_billings` AS `status_billings`,
        `b`.`commission` AS `commission`,
        DATE_FORMAT(`b`.`created_at`, '%e-%c-%Y') AS `created_date`,
        DATE_FORMAT(`b`.`created_at`, '%H:%i') AS `created_hour`,
        (
            TO_DAYS(`b`.`end_date`) - TO_DAYS(`b`.`start_date`)
        ) AS `nbr_days`,
        `bs`.`label_en` AS `booking_status_en`,
        `bs`.`label_de` AS `booking_status_de`,
        `bs`.`label_fr` AS `booking_status_fr`,
        `c`.`camper_name` AS `camper_name`,
        `c`.`image` AS `camper_image`,
        `clt`.`client_name` AS `client_name`,
        `clt`.`client_last_name` AS `client_last_name`,
        `clt`.`telephone` AS `telephone`,
        `clt`.`telephone_code` AS `telephone_code`,
        `clt`.`email` AS `email`,
        `a`.`image` AS `image`
    FROM
        `bookings` `b`
        JOIN `campers` `c` ON `b`.`id_campers` = `c`.`id`
        JOIN `clients` `clt` ON `b`.`id_clients` = `clt`.`id`
        JOIN `booking_status` `bs` ON `b`.`id_booking_status` = `bs`.`id`
        LEFT JOIN `avatars` `a` ON `a`.`id` = `clt`.`id_avatars`
        ;"
        );
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_booking_owner');
    }
}
