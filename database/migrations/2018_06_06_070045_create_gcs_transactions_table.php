<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGcsTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gcs_transactions', function (Blueprint $table) {
            $table->unsignedInteger('transaction_id')->index();
            $table->unsignedInteger('gc_id')->index();
            $table->primary(['transaction_id','gc_id']);
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
        Schema::dropIfExists('gcs_transactions');
    }
}
