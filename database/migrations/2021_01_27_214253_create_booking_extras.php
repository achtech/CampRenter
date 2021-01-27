<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingExtras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_extras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bookings')->nullable();
            $table->unsignedBigInteger('id_insurance_extra')->nullable();
            $table->double('price')->nullable();
            $table->foreign('id_bookings')->references('id')->on('bookings');
            $table->foreign('id_insurance_extra')->references('id')->on('insurance_extra');
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
        Schema::dropIfExists('booking_extras');
    }
}
