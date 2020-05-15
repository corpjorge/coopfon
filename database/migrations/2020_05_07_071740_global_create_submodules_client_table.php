<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GlobalCreateSubmodulesClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submodules_clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('state_id')->constrained();
            $table->foreignId('module_id')->constrained();
            $table->string('name');
            $table->string('title');
            $table->string('route');
            $table->string('icon')->nullable();
            $table->string('order');
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
        Schema::dropIfExists('submodulesclient');
    }
}