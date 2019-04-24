<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeDiscountsTable extends Migration
{
    function up()
    {
        Schema::table('discounts', function (Blueprint $table) {
            $table->integer('type')->default(0);
        });
    }

    function down()
    {
        Schema::table('discounts', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
