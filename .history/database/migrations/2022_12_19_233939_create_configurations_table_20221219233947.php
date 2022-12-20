<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('entreprise_name')->default('entreprise');
            $table->string('telephone')->default('00000000');
            $table->string('adress')->default('adresse');
            $table->string('logo')->default('logo.png');
            $table->string('email')->default('email@email.com');
            $table->string('login_page_background')->default('background.png');
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
        Schema::dropIfExists('configurations');
    }
};
