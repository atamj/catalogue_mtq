<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('operation_client', function(Blueprint $table) {
            $table->foreign('operation_id')->references('id')->on('operations')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
        Schema::table('operation_client', function(Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
        Schema::table('user_client', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
        Schema::table('user_client', function(Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('operation_client', function(Blueprint $table) {
            $table->dropForeign('operation_client_operation_id_foreign');
        });
        Schema::table('operation_client', function(Blueprint $table) {
            $table->dropForeign('operation_client_client_id_foreign');
        });
        Schema::table('user_client', function(Blueprint $table) {
            $table->dropForeign('user_client_user_id_foreign');
        });
        Schema::table('user_client', function(Blueprint $table) {
            $table->dropForeign('user_client_client_id_foreign');
        });
    }
}
