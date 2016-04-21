<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableReplies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('replies', function (Blueprint $table) {
            //
            $table->renameColumn('reply_id', 'replyable_id');
            $table->renameColumn('reply_type', 'replyable_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('replies', function (Blueprint $table) {
            //
            $table->renameColumn('replyable_id', 'reply_id');
            $table->renameColumn('replyable_type', 'reply_type');
        });
    }
}
