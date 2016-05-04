<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColorToPriorityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('priority', function (Blueprint $table) {
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
        Schema::table('priority', function (Blueprint $table) {
            $table->dropUnique('priority_color_unique');
            $table->dropColumn('color');
        });
    }
}
