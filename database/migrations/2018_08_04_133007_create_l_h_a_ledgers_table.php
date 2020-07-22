<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLHALedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ledgerable_id')->index();
            $table->string('ledgerable_type')->index();
            $table->unsignedInteger('vendor_id')->index();
            $table->unsignedInteger('bank_account_id')->index()->nullable();
            $table->dateTime('date');
            /*
             *  0 - Cash
             *  1 - Cheque
             *  2 - NEFT
             *  3 - Adjustment
             * */
            $table->string('payment_mode');
            /*
             *  Mamool
             *  Detention
             *  Loading Charges
             *  Unloading Charges
             *  Lorry Hire Advance
             *  Lorry Hire Balance
             * */
            $table->string('payment_towards');
            /*
             *  0 - credit
             *  1 - debit
             * */
            $table->boolean('payment_type');
            $table->string('amount');
            $table->string('remarks')->nullable();
            $table->string('reference_number')->nullable();
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
        Schema::dropIfExists('l_h_a_ledgers');
    }
}
