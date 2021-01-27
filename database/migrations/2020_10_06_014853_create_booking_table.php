<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->double('total')->nullable();
            $table->integer('price_per_day')->nullable();

            $table->string('status_billings')->nullable();
            $table->double('commission')->nullable();
            $table->string('comment')->nullable();
            $table->integer("insurance_price")->nullable();

            $table->unsignedBigInteger('id_campers')->nullable();
            $table->unsignedBigInteger('id_clients')->nullable();
            $table->unsignedBigInteger('id_booking_status')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');

            $table->foreign('id_campers')->references('id')->on('campers');
            $table->foreign('id_clients')->references('id')->on('clients');
            $table->foreign('id_booking_status')->references('id')->on('booking_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
