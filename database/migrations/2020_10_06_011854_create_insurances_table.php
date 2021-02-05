<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->integer('id_camper_categories')->nullable();
            $table->integer('nbr_days_from')->nullable();
            $table->integer('nbr_days_to')->nullable();
            $table->string('tonage')->nullable();
            $table->double('initial_price')->nullable();
            $table->double('price_per_day')->nullable();
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
        Schema::dropIfExists('insurances');
    }
}
