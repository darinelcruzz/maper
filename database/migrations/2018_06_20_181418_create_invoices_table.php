<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');

            $table->string('folio');
            $table->integer('insurer_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->double('retention');
            $table->double('iva');
            $table->double('amount');
            $table->date('date')->nullable();
            $table->date('date_pay')->nullable();
            $table->string('method')->nullable();
            $table->string('status')->default('pendiente');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('invoices');
    }
}
