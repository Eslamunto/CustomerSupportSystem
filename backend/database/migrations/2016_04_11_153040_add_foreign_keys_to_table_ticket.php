<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToTableTicket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket', function (Blueprint $table) {
            //
            $table->integer('statusId')->nullable()->unsigned()->change();
            $table->foreign('statusId')->references('id')->on('status')
                ->onDelete('set null')->onUpdate('cascade');

            $table->integer('priorityId')->nullable()->unsigned()->change();
            $table->foreign('priorityId')->references('id')->on('priority')
                ->onDelete('set null')->onUpdate('cascade'); 
                
            $table->integer('customerId')->nullable()->unsigned()->change();
            $table->foreign('customerId')->references('id')->on('customer')
                ->onDelete('cascade')->onUpdate('cascade');
            
            $table->integer('departmentId')->nullable()->unsigned()->change();
            $table->foreign('departmentId')->references('id')->on('department')
                ->onDelete('set null')->onUpdate('cascade'); 

            $table->integer('postId')->nullable()->unsigned()->change();
            $table->foreign('postId')->references('id')->on('posts')
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
        Schema::table('ticket', function (Blueprint $table) {
            //
            $table->dropForeign('ticket_statusid_foreign');
            $table->dropForeign('ticket_priorityid_foreign');
            $table->dropForeign('ticket_customerid_foreign');
            $table->dropForeign('ticket_departmentid_foreign');
            $table->dropForeign('ticket_postid_foreign');
        });
    }
}
