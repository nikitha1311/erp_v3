<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('customer_id')->index();
            $table->unsignedInteger('route_id')->index();
            $table->unsignedInteger('billing_id')->nullable()->index();
            $table->unsignedInteger('lha_id')->nullable()->index();
            $table->unsignedInteger('invoice_id')->nullable()->index();
            $table->integer('manual_freight')->default(0);
            $table->integer('loading')->default(0);
            $table->integer('unloading')->default(0);
            $table->integer('handling')->default(0);
            $table->integer('detention')->default(0);
            $table->integer('others')->default(0);
            $table->string('remarks')->nullable();
//            $table->float('sgst')->default(0);
//            $table->float('cgst')->default(0);
//            $table->float('igst')->default(0);
//            $table->float('subtotal')->default(0);
            $table->float('total')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('transactions');
    }
}
