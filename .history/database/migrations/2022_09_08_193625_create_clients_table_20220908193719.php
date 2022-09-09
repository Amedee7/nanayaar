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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('numb_cli');
            $table->string('nom');
            $table->string('prenom');
            $table->string('first_phone');
            $table->string('second_phone');
            $table->date('date_naiss');
            $table->string('numb_cnib');
            $table->enum('genre', ['Masculin', 'Feminin'])->default('Masculin')->nullable();


            $table->enum('status', ['accept', 'reject', 'pending'])->default('pending');


            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('created_by')->nullable()->default(1)->unsigned();

            $table->integer('updated_by')->nullable()->default(1)->unsigned();

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
};
