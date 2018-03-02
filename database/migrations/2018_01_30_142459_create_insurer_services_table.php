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

            $table->integer('insurer_id');
            $table->string('brand');
            $table->string('type')->nullable();
            $table->string('model')->nullable();
            $table->string('plate')->nullable();
            $table->string('color')->nullable();
            $table->string('client');
            $table->string('location');
            $table->string('destination');
            $table->integer('driver_id');
            $table->timestamp('date_service');
            $table->double('amount')->default(0);
            $table->timestamp('contact')->nullable();
            $table->timestamp('assignment')->nullable();
            $table->timestamp('end')->nullable();
            $table->string('file1')->nullable();
            $table->string('file2')->nullable();
            $table->string('method')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('bill')->nullable();
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
