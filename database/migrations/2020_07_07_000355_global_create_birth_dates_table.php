<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GlobalCreateBirthDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birth_dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('birthday_user')->nullable();
            $table->foreign('birthday_user')->references('id')->on('users');
            $table->foreignId('user_id')->constrained();
            $table->longText('congratulations')->nullable();
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
        Schema::dropIfExists('birth_dates');
    }
}
