<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');

            $table->string('service')->nullable();
            $table->string('description')->nullable();
            $table->string('brand')->nullable();
            $table->string('type')->nullable();
            $table->string('category')->nullable();
            $table->string('load')->nullable();
            $table->string('plate')->nullable();
            $table->string('color')->nullable();
            $table->integer('inventory')->nullable();
            $table->string('key')->nullable();
            $table->string('username')->nullable();
            $table->string('origin')->nullable();
            $table->string('destination')->nullable();
            $table->string('driver')->nullable();
            $table->string('unit')->nullable();
            $table->timestamp('date_service')->nullable();
            $table->timestamp('date_out')->nullable();
            $table->timestamp('date_return')->nullable();
            $table->float('amount')->nullable();
            $table->string('status')->nullable();
            $table->string('lot')->nullable();

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
        Schema::dropIfExists('services');
    }
}
