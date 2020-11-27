<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateViewClientMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE OR REPLACE  VIEW `v_client_messages`  AS  select `chats`.`id_renters` AS `renter_id`,`chats`.`id_owners` AS `owner_id`,`chats`.`id` AS `id`,concat(`renter`.`client_last_name`,`renter`.`client_name`) AS `renter_name`,concat(`owner`.`client_last_name`,`owner`.`client_name`) AS `owner_name`,`renter`.`photo` AS `renter_photo`,`owner`.`photo` AS `owner_photo`,`chats`.`message` AS `message`,`chats`.`status` AS `status`,`chats`.`updated_at` AS `date_message`,`chats`.`ordre_message` AS `ordre_message`,`chats`.`id_bookings` AS `id_bookings` from ((`chats` join `clients` `owner`) join `clients` `renter`) where ((`chats`.`id_owners` = `owner`.`id`) and (`chats`.`id_renters` = `renter`.`id`)) ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_client_messages');
    }
}
