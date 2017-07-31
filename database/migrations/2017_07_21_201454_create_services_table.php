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
            $table->string('model')->nullable();
            $table->string('type')->nullable();
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
            $table->timestamp('date')->nullable();

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
