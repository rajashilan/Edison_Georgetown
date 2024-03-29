<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreakfastSelectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breakfast_selections', function (Blueprint $table) {
            $table->id('id');
            $table->string('breakfast_selection_id');
            $table->string('item_name');
            $table->unsignedBigInteger('group_id');
            $table->integer('sequence');
            $table->tinyInteger('status');
            $table->string('photo')->nullable();
            $table->string('remark')->nullable();
            $table->tinyInteger('day')->nullable();
            $table->string('set')->nullable();
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
        Schema::dropIfExists('breakfast_selections');
    }
}
