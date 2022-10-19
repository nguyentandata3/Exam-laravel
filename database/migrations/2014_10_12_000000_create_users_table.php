<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('facebook_id')->nullable();
            $table->string('uuid');
            $table->string('username');
            $table->string('fullname');
            $table->tinyInteger('sex')->default(1)->comment('1: Male - 2: Female');
            $table->string('email')->unique()->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('level')->default(2);
            $table->rememberToken()->nullable();
            $table->timestamp('birth')->nullable();
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
};
