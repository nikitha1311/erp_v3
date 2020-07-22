<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoadingHireAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loading_hire_agreements', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('branch_id');
            $table->string('number')->unique()->nullable();
            $table->dateTime('date');
            $table->string('truck_number');
            /*
             * 0 - Local
             * 1 - Full Trip
             * */
            $table->boolean('type');
            /*
             * 0 - closed
             * 1 - live
             *  */
            $table->boolean('status')->default(1);
            $table->unsignedInteger('from_id');
            $table->unsignedInteger('to_id');
            $table->unsignedInteger('truck_type_id');
            $table->unsignedInteger('vendor_id');
            $table->string('driver_name')->nullable();
            $table->string('driver_phone')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_phone')->nullable();
            $table->string('hire');
            $table->dateTime('loading_reported')->nullable();
            $table->dateTime('loading_released')->nullable();
            $table->dateTime('unloading_reported')->nullable();
            $table->dateTime('unloading_released')->nullable();
            $table->smallInteger('loading_detention')->nullable();
            $table->smallInteger('unloading_detention')->nullable();
            $table->unsignedInteger('created_by');
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
        Schema::dropIfExists('loading_hire_agreements');
    }
}
