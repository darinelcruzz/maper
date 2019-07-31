<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddObservationsToInsurersTable extends Migration
{
    public function up()
    {
        Schema::table('insurers', function (Blueprint $table) {
            $table->text('observations')->nullable();
            $table->text('reception')->nullable();
        });
    }

    public function down()
    {
        Schema::table('insurers', function (Blueprint $table) {
            $table->dropColumn('observations');
            $table->dropColumn('reception');
        });
    }
}
