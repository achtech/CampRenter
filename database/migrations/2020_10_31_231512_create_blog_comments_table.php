<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->longText('comment')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->unsignedBigInteger('id_blogs')->nullable();
            $table->unsignedBigInteger('id_parent1')->nullable();
            $table->unsignedBigInteger('id_parent2')->nullable();
            $table->foreign('id_blogs')->references('id')->on('blogs');
            $table->foreign('id_parent1')->references('id')->on('blog_comments');
            $table->foreign('id_parent2')->references('id')->on('blog_comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_comments');
    }
}
