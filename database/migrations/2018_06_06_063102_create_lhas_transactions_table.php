<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLhasTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lhas_transactions', function (Blueprint $table) {
            $table->unsignedInteger('transaction_id')->index();
            $table->unsignedInteger('lha_id')->index();
            $table->primary(['transaction_id','lha_id']);
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
        Schema::dropIfExists('lhas_transactions');
    }
}
