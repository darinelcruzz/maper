<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsurerServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurer_services', function (Blueprint $table) {
            $table->increments('id');

            $table->date('date');
            $table->integer('driver_id');
            $table->integer('insurer_id');
            $table->string('vehicule');
            $table->string('plate')->nullable();
            $table->string('model')->nullable();
            $table->string('type')->nullable();
            $table->string('color')->nullable();
            $table->string('location');
            $table->string('destiny');
            $table->string('client');
            $table->double('amount')->default(0);
            $table->string('contact')->nullable();
            $table->string('assignment')->nullable();
            $table->string('end')->nullable();
            $table->string('file1')->nullable();
            $table->string('file2')->nullable();
            $table->string('status')->default('pendiente');

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
        Schema::dropIfExists('insurer_services');
    }
}
