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
            $table->string("title_color")->nullable();
            $table->string("header_bgc")->nullable();
            $table->string("header_bgi")->nullable();
            $table->string("header_color")->nullable();
            $table->string('footer_top_bgc')->nullable();
            $table->string('footer_top_bgi')->nullable();
            $table->string('footer_top_color')->nullable();
            $table->string('footer_top_btn_bgc')->nullable();
            $table->string('footer_top_btn_color')->nullable();
            $table->string('footer_top_btn_radius')->nullable();
            $table->string('footer_top_input_radius')->nullable();
            $table->string('footer_bottom_bgc')->nullable();
            $table->string('footer_bottom_bgi')->nullable();
            $table->string('footer_bottom_color')->nullable();
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->longText('css')->nullable();
            $table->longText('js')->nullable();
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
