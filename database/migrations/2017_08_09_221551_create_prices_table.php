<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('service')->nullable();
            $table->float('km')->nullable();
            $table->float('moto')->nullable();
            $table->float('car')->nullable();
            $table->float('ton3')->nullable();
            $table->float('ton5')->nullable();
            $table->float('ton10')->nullable();
            $table->string('observation')->nullable();

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
        Schema::dropIfExists('prices');
    }
}
