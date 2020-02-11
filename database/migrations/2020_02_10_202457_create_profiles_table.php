<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('profiles', function (Blueprint $table) {
             $table->increments('id');
             $table->unsignedBigInteger('user_id')->unique();
             $table->text('bio');
             $table->string('company', 150);
             $table->string('technologies', 200);
             $table->timestamps();
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
