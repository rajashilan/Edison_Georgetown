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
            $table->id('breakfast_selection_id');
            $table->string('set');
            $table->string('des');
            $table->tinyInteger('status');
            $table->string('photo');
            $table->tinyInteger('day');
            $table->string('remark');
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
