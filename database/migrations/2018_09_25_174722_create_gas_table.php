<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGasTable extends Migration
{
    function up()
    {
        Schema::create('gas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('ticket');
            $table->date('date');
            $table->string('product');
            $table->string('type')->nullable();
            $table->double('total');
            $table->string('invoice')->nullable();
            $table->string('status')->default('pendiente');
            $table->string('observations')->nullable();


            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('gas');
    }
}
