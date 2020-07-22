<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('trip_id');
            $table->unsignedInteger('from_id');
            $table->unsignedInteger('to_id');
            $table->unsignedInteger('vendor_id');
            $table->string('hire');
            $table->string('loading_charges')->default(0);
            $table->string('unloading_charges')->default(0);
            $table->string('brokerage')->default(0);
            $table->string('tds')->default(0);
            $table->string('outstanding');
            $table->string('weight');
            $table->string('material');
            $table->string('remarks');
            $table->date('pod_received_date')->nullable();
            $table->string('pod_remarks')->default('Not Submitted');
            $table->dateTime('loading_reported')->nullable();
            $table->dateTime('loading_released')->nullable();
            $table->dateTime('unloading_reported')->nullable();
            $table->dateTime('unloading_released')->nullable();
            $table->smallInteger('loading_detention')->nullable();
            $table->smallInteger('unloading_detention')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
