<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraDriversTable extends Migration
{
    function up()
    {
        Schema::create('extra_drivers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('service_id')->nullable();
            $table->integer('insurer_service_id')->nullable();
            $table->integer('driver_id');
            $table->integer('extra');
            $table->integer('type');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('extra_drivers');
    }
}
