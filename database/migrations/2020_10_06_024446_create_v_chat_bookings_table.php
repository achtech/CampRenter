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
        DB::statement("CREATE VIEW `v_chats_bookings`  AS  select `m`.`message` AS `message`,`m`.`date_sent` AS `date_sent`,`m`.`id_bookings` AS `id_bookings`,`m`.`ordre_message` AS `ordre_message`,`c`.`id` AS `id_owner`,`c`.`client_name` AS `owner_first_name`,`c`.`client_last_name` AS `owner_last_name`,`ao`.`image` AS `image_owner`,`l`.`id` AS `id_renter`,`l`.`client_name` AS `renter_first_name`,`l`.`client_last_name` AS `renter_last_name`,`ar`.`image` AS `image_renter` from (((((`chats` `m` join `bookings` `b` on((`m`.`id_bookings` = `b`.`id`))) left join `clients` `c` on((`m`.`id_owners` = `c`.`id`))) left join `avatars` `ao` on((`c`.`id_avatars` = `ao`.`id`))) left join `clients` `l` on((`m`.`id_renters` = `l`.`id`))) left join `avatars` `ar` on((`l`.`id_avatars` = `ar`.`id`)))");
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
