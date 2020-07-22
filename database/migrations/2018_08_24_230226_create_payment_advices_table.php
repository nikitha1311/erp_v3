<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentAdvicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_advices', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date');
            $table->unsignedInteger('customer_id');
            $table->string('payment_mode');
            $table->string('amount');
            $table->string('reference_number');
            $table->string('remarks');
            $table->unsignedInteger('created_by');
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
        Schema::dropIfExists('payment_advices');
    }
}
