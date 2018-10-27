<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCutToInsurerServicesTable extends Migration
{
    public function up()
    {
        Schema::table('insurer_services', function (Blueprint $table) {
            $table->integer('cut')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('insurer_services', function (Blueprint $table) {
            $table->dropColumn('cut');
        });
    }
}
