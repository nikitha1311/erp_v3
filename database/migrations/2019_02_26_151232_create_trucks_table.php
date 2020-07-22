<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->unsignedInteger('trip_id')->nullable();
            $table->unsignedInteger('truck_type_id');
            $table->string('group');
            $table->float('today_distance')->nullable();
            $table->string('location')->nullable();
            $table->dateTime('last_seen')->nullable();
            $table->foreign('truck_type_id')->references('id')->on('truck_types');
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
        Schema::dropIfExists('trucks');
    }
}
