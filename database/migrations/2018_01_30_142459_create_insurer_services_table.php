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
            $table->string('description')->nullable();
            $table->string('brand')->nullable();
            $table->string('type')->nullable();
            $table->string('model')->nullable();
            $table->string('category')->nullable();
            $table->string('load')->nullable();
            $table->string('plate')->nullable();
            $table->string('color')->nullable();
            $table->integer('inventory')->nullable();
            $table->string('user')->nullable();
            $table->string('origin')->nullable();
            $table->string('destination')->nullable();
            $table->integer('driver_id')->nullable();
            $table->integer('extra_driver')->nullable();
            $table->string('helper')->nullable();
            $table->integer('extra_helper')->nullable();
            $table->string('unit_id')->nullable();
            $table->string('booth')->nullable();
            $table->timestamp('date_return')->nullable();
            $table->timestamp('date_assignment')->nullable();
            $table->string('status')->default('credito');
            $table->double('amount')->default(0);
            $table->integer('maneuver')->nullable();
            $table->integer('pension')->nullable();
            $table->string('bill')->nullable();
            $table->integer('others')->nullable();
            $table->integer('discount')->nullable();
            $table->string('reason')->nullable();
            $table->timestamp('date_contact')->nullable();
            $table->timestamp('date_end')->nullable();
            $table->string('file')->nullable();
            $table->string('folio')->nullable();
            $table->string('sinister')->nullable();

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
