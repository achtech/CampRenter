<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddZipcodeCityCountryPositionsToCamperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campers', function (Blueprint $table) {
            //
            $table->integer("zip_code")->nullable();
            $table->string("city")->nullable();
            $table->string("country")->nullable();
            $table->string("position_x")->nullable();
            $table->string("position_y")->nullable();
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
