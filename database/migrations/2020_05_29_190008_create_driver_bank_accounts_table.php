<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_bank_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('driver_id');
            $table->string('account_name');
            $table->string('account_number');
            $table->string('IFSC_code');
            $table->string('card_number');
            $table->string('bank_name');
            $table->string('bank_address');
            /* 1 - Active
              0 - Inactive */
            $table->boolean('status');
            $table->string('created_by');
            $table->string('creatable_id');
            $table->string('creatable_type');
            $table->string('remarks');
            
            $table->timestamps();
            $table->foreign('driver_id')->references('id')->on('drivers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driver_bank_accounts');
    }
}
