<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('solicitude_id')->unsigned();
            $table->foreign('solicitude_id')->references('id')->on('solicitudes');
            $table->string('entity');
            $table->string('payment_file')->default('contado.jpg');
            $table->integer('amount');
            $table->integer('operation');
            $table->string('operation_date');
            $table->integer('enable')->default(1);
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
        Schema::drop('payments');
    }
}
