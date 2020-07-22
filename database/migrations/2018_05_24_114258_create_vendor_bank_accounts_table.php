<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_bank_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vendor_id')->nullable();
            $table->string('beneficiary_name');
            $table->string('beneficiary_phone')->unique();
            $table->string('bank_name');
            $table->string('bank_branch');
            $table->string('account_number')->unique();
            $table->string('ifsc_code');
            $table->unsignedInteger('created_by');
            $table->boolean('valid')->default(0);
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
        Schema::dropIfExists('vendor_bank_accounts');
    }
}
