<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_billings')->nullable();
            $table->unsignedBigInteger('id_bookings')->nullable();

            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');

            $table->foreign('id_billings')->references('id')->on('billings');
            $table->foreign('id_bookings')->references('id')->on('bookings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing_bookings');
    }
}
