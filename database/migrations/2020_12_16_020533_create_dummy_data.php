<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDummyData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('dummy_data', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

      $user = new App\Models\User();
      $user->name = 'Default Account';
      $user->email = 'default@mail.com';
      $user->password = bcrypt('123qwe');
      $user->status = '1';
      $user->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('dummy_data');
        App\Models\User::where('name', 'Default Account')->first()->delete();
    }
}
