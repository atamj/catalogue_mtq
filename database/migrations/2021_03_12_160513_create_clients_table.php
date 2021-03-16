<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url')->unique();
            $table->string('gtag')->nullable();
            $table->string("logo_header")->nullable();
            $table->string('logo_footer')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('contact_link')->nullable();
            $table->string('conditions_link')->nullable();
            $table->string('cookies_link')->nullable();
            $table->string('confidentialite_link')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
