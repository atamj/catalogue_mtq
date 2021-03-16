<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_client', function (Blueprint $table) {
            $table->id();
            $table->integer('operation_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->string("title")->nullable();
            $table->string("header_bg")->nullable();
            $table->longText('css')->nullable();
            $table->longText('js')->nullable();
            $table->string('catalogue_cover')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operation_client');
    }
}
