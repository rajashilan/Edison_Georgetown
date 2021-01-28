<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerBreakfastOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_breakfast_orders', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id');
            $table->string('breakfast_selection_id');
            $table->tinyInteger('status');
            $table->string('remark')->nullable();
            $table->tinyInteger('breakfast_location');
            $table->dateTime('booking_date_time');
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
        Schema::dropIfExists('customer_breakfast_orders');
    }
}
