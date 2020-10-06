<?php

use Illuminate\Database\Migrations\Migration;

class CreateVChatBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW v_chats_bookings AS "
            . "SELECT"
            . "`m`.`message` AS `message`,"
            . "`m`.`date_sent` AS `date_sent`,"
            . "`m`.`id_bookings` AS `id_bookings`,"
            . "`m`.`ordre_message` AS `ordre_message`,"
            . "`c`.`id` AS `id_owner`,"
            . "`c`.`client_name` AS `owner_first_name`,"
            . "`c`.`client_last_name` AS `owner_last_name`,"
            . "`ao`.`image` AS `image_owner`,"
            . "`l`.`id` AS `id_renter`,"
            . "`l`.`client_name` AS `renter_first_name`,"
            . "`l`.`client_last_name` AS `renter_last_name`,"
            . "`ar`.`image` AS `image_renter`"
            . "FROM"
            . "("
            . "   ("
            . "   ("
            . "   ("
            . "   ("
            . "   `chats` `m`"
            . "JOIN `bookings` `b` ON"
            . "(`m`.`id_bookings` = `b`.`id`)"
            . ")"
            . "LEFT JOIN `clients` `c` ON"
            . "(`m`.`id_owners` = `c`.`id`)"
            . ")"
            . "LEFT JOIN `avatars` `ao` ON"
            . "(`c`.`id_avatars` = `ao`.`id`)"
            . ")"
            . "LEFT JOIN `clients` `l` ON"
            . "(`m`.`id_renters` = `l`.`id`)"
            . ")"
            . "LEFT JOIN `avatars` `ar` ON"
            . "(`l`.`id_avatars` = `ar`.`id`))"

        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW v_chats_bookings");
    }
}
