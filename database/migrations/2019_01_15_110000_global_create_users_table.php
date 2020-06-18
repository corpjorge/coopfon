<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GlobalCreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users',
            function (Blueprint $table) {
                $table->id();
                $table->foreignId('role_id')->constrained();
                $table->string('name');
                $table->string('email')->nullable()->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();

                //Datos extras
                $table->string('social_id')->nullable();
                $table->foreignId('document_type_id')->unsigned()->nullable();
                $table->foreign('document_type_id')->references('id')->on('document_types');
                $table->string('document')->unique()->nullable();
                $table->biginteger('phone')->nullable();
                $table->string('code')->unique()->nullable();
                $table->foreignId('member_id')->unsigned()->nullable();
                $table->foreign('member_id')->references('id')->on('members');
                $table->foreignId('gender_id')->unsigned()->nullable();
                $table->foreign('gender_id')->references('id')->on('genders');
                $table->string('address')->nullable();
                $table->string('area')->nullable();
                $table->biginteger('city_id')->unsigned()->nullable();
                $table->foreign('city_id')->references('code')->on('city');
                $table->string('picture')->nullable();
                $table->date('birth_date')->nullable();
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
        Schema::dropIfExists('users');
    }
}
