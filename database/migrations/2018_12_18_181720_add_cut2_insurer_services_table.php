<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCut2InsurerServicesTable extends Migration
{
    public function up()
    {
        Schema::table('insurer_services', function (Blueprint $table) {
            $table->date('cut2_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('insurer_services', function (Blueprint $table) {
            $table->dropColumn('cut2_at');
        });
    }
}
