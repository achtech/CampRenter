<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamperReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camper_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->longText('comment')->nullable();
            $table->integer('rate_service')->nullable();
            $table->integer('rate_managing')->nullable();
            $table->integer('rate_cleanliness')->nullable();
            $table->integer('helpfulReview')->default('0')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->timestamps();
            $table->unsignedBigInteger('id_campers')->nullable();
            $table->foreign('created_by')->references('id')->on('clients');
            $table->foreign('updated_by')->references('id')->on('clients');
            $table->foreign('id_campers')->references('id')->on('campers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camper_reviews');
    }
}
