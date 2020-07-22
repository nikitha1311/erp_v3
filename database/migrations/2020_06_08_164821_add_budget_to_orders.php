<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBudgetToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            /*
             * 0 - Full Load
             * 1 - Part Load
             * 2 - Empty
             */
            $table->tinyInteger('type')->after('hire')->default(0);
            $table->string('mileage')->after('unloading_charges')->default(0);
            $table->string('diesel_liters')->after('mileage')->default(0);
            $table->string('kms')->after('diesel_liters')->default(0);
            $table->string('enroute')->after('kms')->default(0);
            $table->dateTime('expected_delivery')->nullable();
            $table->dateTime('actual_delivery')->nullable();
            $table->dateTime('budget_transferred_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('type', 'mileage', 'diesel_liters', 'kms',
                'enroute', 'expected_delivery', 'actual_delivery', 'budget_transferred_at');
        });
    }
}
