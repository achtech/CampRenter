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
            $table->string('photo')->nullable();
            $table->string('sex')->nullable();
            $table->string('street')->nullable();
            $table->string('street_number')->nullable();
            $table->string('location')->nullable();
            $table->integer('postal_code')->nullable();
            $table->string('country')->nullable();
            $table->string('telephone')->nullable();
            $table->string('telephone_code')->nullable();
            $table->integer('day_of_birth')->nullable();
            $table->integer('month_of_birth')->nullable();
            $table->integer('year_of_birth')->nullable();
            $table->integer('professional_rental_company')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->string('account_holder_location')->nullable();
            $table->string('account_holder_street')->nullable();
            $table->string('account_holder_building_number')->nullable();
            $table->string('account_holder_postal_code')->nullable();
            $table->string('account_holder_country')->nullable();
            $table->string('bank_data_adress')->nullable();
            $table->string('bank_data_iban')->nullable();
            $table->string('bank_data_bic')->nullable();
            $table->string('where_you_see_us')->nullable();
            $table->string('instagram_user_name')->nullable();
            $table->string('who_are_you')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('review')->nullable();
            $table->enum('type_login', array('forms', 'facebook', 'google'))->nullable();
            $table->string('language')->nullable();
            $table->string('password')->nullable();
            $table->string('national_id')->nullable();
            $table->string('image_national_id')->nullable();
            $table->string('driving_licence')->nullable();
            $table->string('driving_licence_image')->nullable();
            $table->string('status')->nullable();
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->unsignedBigInteger('id_avatars')->nullable();
            $table->foreign('id_avatars')->references('id')->on('avatars')->default(1);
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
