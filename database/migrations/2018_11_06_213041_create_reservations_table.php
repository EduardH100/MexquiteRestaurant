<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('hour');
            $table->integer('clients_quantity')->unsigned();
            $table->string('payment');
            $table->string('details')->nullable();
            $table->string('occasion')->nullable();

            
            $table->integer('client_id')->unsigned();
            $table->integer('table_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('table_id')->references('id')->on('tables');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
