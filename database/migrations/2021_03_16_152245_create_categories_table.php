<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('operation_id')->unsigned();
            $table->string('name');
            $table->string('url')->unique();
            $table->string('img')->nullable();
            $table->timestamps();
        });
        Schema::table('categories', function(Blueprint $table) {
            $table->foreign('operation_id')->references('id')->on('operations')
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
        Schema::table('categories', function(Blueprint $table) {
            $table->dropForeign('categories_operation_id_foreign');
        });
        Schema::dropIfExists('categories');
    }
}
