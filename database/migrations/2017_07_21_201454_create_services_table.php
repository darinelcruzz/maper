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
            $table->integer('model')->nullable();
            $table->string('category')->nullable();
            $table->string('load')->nullable();
            $table->string('plate')->nullable();
            $table->string('color')->nullable();
            $table->integer('inventory')->nullable();
            $table->string('key')->nullable();
            $table->string('client_id')->nullable();
            $table->string('origin')->nullable();
            $table->string('destination')->nullable();
            $table->integer('driver_id')->nullable();
            $table->integer('extra_driver')->nullable();
            $table->integer('helper')->nullable();
            $table->integer('extra_helper')->nullable();
            $table->string('unit_id')->nullable();
            $table->timestamp('date_service')->nullable();
            $table->timestamp('date_return')->nullable();
            $table->timestamp('date_out')->nullable();
            $table->double('amount')->default(0);
            $table->double('ret')->default(-1);
            $table->string('status')->nullable();
            $table->string('lot')->nullable();
            $table->integer('maneuver')->nullable();
            $table->integer('pension')->nullable();
            $table->string('releaser')->nullable();
            $table->string('bill')->nullable();
            $table->integer('others')->nullable();
            $table->integer('discount')->nullable();
            $table->string('reason')->nullable();
            $table->string('pay')->nullable();
            $table->string('view')->nullable();
            $table->string('serial')->nullable();
            $table->integer('folio')->nullable();

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
