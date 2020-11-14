<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CamperInssuranceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camper_inssurance', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->string('roadside_assistance')->nullable();
            $table->string('deposit')->nullable();
            $table->string('deductible')->nullable();
            $table->string('interior_insurance')->nullable();
            $table->unsignedBigInteger('id_campers')->nullable();

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
        //
    }
}
