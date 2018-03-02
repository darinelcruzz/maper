<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescriptionToInsurerServicesTable extends Migration
{

    public function up()
    {
        Schema::table('insurer_services', function($table) {
            $table->string('description')->nullable();
            $table->string('category')->nullable();
            $table->string('helper_id')->nullable();
            $table->string('unit_id')->nullable();
        });

    }

    public function down()
    {
        Schema::table('insurer_services', function($table) {
            $table->dropColumn('description');
            $table->dropColumn('category');
            $table->dropColumn('helper_id');
            $table->dropColumn('unit_id');
        });
    }
}
