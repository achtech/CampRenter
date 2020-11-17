<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_renter')->nullable();
            $table->unsignedBigInteger('id_owner')->nullable();
            $table->string('message')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->foreign('id_renter')->references('id')->on('clients');
            $table->foreign('id_owner')->references('id')->on('clients');
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
        Schema::dropIfExists('notifications');
    }
}
