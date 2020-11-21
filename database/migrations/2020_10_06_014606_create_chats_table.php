 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->string('message', 100)->nullable();
            $table->string('status', 100)->nullable();
            $table->dateTime('date_sent')->nullable();
            $table->bigInteger('ordre_message')->nullable();

            $table->unsignedBigInteger('id_owners')->nullable();
            $table->unsignedBigInteger('id_renters')->nullable();
            $table->unsignedBigInteger('id_bookings')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('id_owners')->references('id')->on('clients');
            $table->foreign('id_renters')->references('id')->on('clients');
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
        Schema::dropIfExists('chats');
    }
}
