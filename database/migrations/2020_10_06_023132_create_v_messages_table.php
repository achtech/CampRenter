<?php

use Illuminate\Database\Migrations\Migration;

class CreateVMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW v_messages AS "
            . "SELECT"
            . "  `m`.`id` AS `id`,"
            . "  `m`.`full_name` AS `full_name`,"
            . "  `m`.`email` AS `email`,"
            . "  `m`.`telephone` AS `telephone`,"
            . "  `m`.`subject` AS `subject`,"
            . "  `m`.`message` AS `message`,"
            . "  `m`.`status` AS `status`,"
            . "  `m`.`send_date` AS `send_date`"
            . "FROM `messages` `m`"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW v_messages");
    }
}
