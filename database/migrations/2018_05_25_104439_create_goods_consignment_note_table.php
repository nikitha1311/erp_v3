<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsConsignmentNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_consignment_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('transaction_id')->nullable();
            $table->string('number')->unique();
            $table->unsignedInteger('branch_id');
            $table->dateTime('date');
            $table->string('invoice_number')->nullable();
            $table->string('gst_number')->nullable();
            $table->unsignedInteger('consignor_id')->index();
            $table->unsignedInteger('consignee_id')->index();
            $table->unsignedInteger('bill_on_id')->index();
            $table->text('desc')->nullable();
            $table->string('value');
            $table->unsignedInteger('created_by')->index();
            /*
             *  0 - Not Received
             *  1 - Received
             * */
            $table->boolean('ack_status')->default('0');
            $table->dateTime('ack_received_date')->nullable();
            $table->string('ack_received_remarks')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('branch_id')->references('id')->on('branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_consignment_notes');
    }
}
