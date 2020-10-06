<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToCamper extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campers', function (Blueprint $table) {
            $table->unsignedBigInteger('id_camper_status')->nullable()->after('id_fuels');
            $table->foreign('id_camper_status')->references('id')->on('camper_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campers', function (Blueprint $table) {
            //
        });
    }
}
