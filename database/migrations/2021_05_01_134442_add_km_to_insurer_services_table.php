<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKmToInsurerServicesTable extends Migration
{
    function up()
    {
      Schema::table('insurer_services', function (Blueprint $table) {
          $table->integer('km')->default(0);
      });
    }

    function down()
    {
      Schema::table('insurer_services', function (Blueprint $table) {
          $table->dropColumn('km');
      });
    }
}
