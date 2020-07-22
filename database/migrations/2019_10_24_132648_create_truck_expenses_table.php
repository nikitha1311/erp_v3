<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruckExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('expense_date');
            $table->string('type');
            $table->string('type_description');
            $table->integer('amount');
            $table->dateTime('valid_till');
            $table->unsignedInteger('truck_id');
            $table->timestamps();

            $table->foreign('truck_id')->references('id')->on('trucks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('truck_expenses');
    }
}
