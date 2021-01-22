<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsurancesExtraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_extra', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('nbr_days_from')->nullable();
            $table->integer('nbr_days_to')->nullable();
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
        Schema::dropIfExists('insurance_extra');
    }
}
