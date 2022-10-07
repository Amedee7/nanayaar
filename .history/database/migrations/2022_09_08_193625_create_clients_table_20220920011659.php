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
            $table->uuid();
            $table->string('numb_cli');
            $table->string('nom');
            $table->string('prenom');
            $table->string('first_phone');
            $table->string('second_phone');
            $table->date('date_naiss');
            $table->string('numb_cnib');

            $table->enum('genre', ['Masculin', 'Feminin'])->default('Masculin')->nullable();

            $table->enum('status', ['Accepté', 'Rejeté', 'En attente'])->default('En attente');

            $table->string('photo')->default('avatar.png');

            $table->foreignId('user_id');

            $table->foreignId('created_by');
            $table->foreignId('updated_by');
            $table->foreignId('deleted_by');

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');

            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onUpdate('cascade');

            $table->timestamps();

            $table->softDeletes();
        });

        Schema::create('client_user', function (Blueprint $table) {
            $table->foreignId('client_id');
            $table->foreignId('user_id');


            $table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
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
