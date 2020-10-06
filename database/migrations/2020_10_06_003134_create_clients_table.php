<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->nullable();
            $table->string('client_last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('national_id')->nullable();
            $table->string('image_national_id')->nullable();
            $table->string('driving_licence')->nullable();
            $table->string('driving_licence_image')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('id_avatars');
            $table->foreign('id_avatars')->references('id')->on('avatars');
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
