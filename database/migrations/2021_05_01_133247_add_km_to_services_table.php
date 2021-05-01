<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKmToServicesTable extends Migration
{
    function up()
    {
      Schema::table('services', function (Blueprint $table) {
          $table->integer('km')->default(0);
      });
    }

    function down()
    {
      Schema::table('services', function (Blueprint $table) {
          $table->dropColumn('km');
      });
    }
}
