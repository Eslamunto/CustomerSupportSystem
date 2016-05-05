<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToTableUserTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_tickets', function (Blueprint $table) {
            //
            $table->integer('userId')->nullable()->unsigned()->change();
            $table->foreign('userId')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('ticketId')->nullable()->unsigned()->change();
            $table->foreign('ticketId')->references('id')->on('ticket')
                ->onDelete('cascade')->onUpdate('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_tickets', function (Blueprint $table) {
            //
            $table->dropForeign('user_tickets_userid_foreign');
            $table->dropForeign('user_tickets_ticketid_foreign');
        });
    }
}
