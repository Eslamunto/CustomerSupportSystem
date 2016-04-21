<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColorToTableStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('status', function (Blueprint $table) {
            //
            $table->string('color')->after('name');
            $table->unique('color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('status', function (Blueprint $table) {
            //
            $table->dropUnique('status_color_unique');
            $table->dropColumn('color');
        });
    }
}
