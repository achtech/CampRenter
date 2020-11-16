<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamperBookmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camper_bookmarks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_clients')->nullable();
            $table->unsignedBigInteger('id_campers')->nullable();

            $table->foreign('id_clients')->references('id')->on('clients');
            $table->foreign('id_campers')->references('id')->on('campers');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camper_bookmarks');
    }
}
