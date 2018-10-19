<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('nickname')->nullable();
            $table->time('start_hour')->nullable();
            $table->time('end_hour')->nullable();
            $table->integer('status')->default(1);

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('drivers');
    }
}
