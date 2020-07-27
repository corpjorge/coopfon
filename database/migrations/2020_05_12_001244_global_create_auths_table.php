<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GlobalCreateAuthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('state_id')->constrained();
            $table->string('name');
            $table->string('path');
            $table->string('description');
            $table->string('icon');
            $table->string('fields')->nullable();
            $table->string('main')->nullable();
            $table->string('parameters')->nullable();
            $table->string('version')->nullable();
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
        Schema::dropIfExists('auths');
    }
}
