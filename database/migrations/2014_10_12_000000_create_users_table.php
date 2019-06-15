<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();;
            $table->string('password');
            $table->string('pass');
            $table->string('level');
            $table->string('user');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('users');
    }
}
