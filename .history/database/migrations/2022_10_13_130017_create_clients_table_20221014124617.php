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
            $table->string('name');
            $table->string('lastname');
            $table->string('first_phone');
            $table->string('second_phone');
            $table->date('date_naiss');
            $table->string('numb_cnib');
            $table->float('montant_demande', 8, 2);
            $table->enum('genre', ['Accepter', 'En attente'])->default('En attente')->nullable();


            $table->enum('genre', ['Masculin', 'Feminin'])->default('Masculin')->nullable();

            $table->string('photo')->default('avatar.png');

            $table->foreignId('user_id');

            $table->foreignId('created_by');
            $table->foreignId('updated_by')->nullable();
            $table->foreignId('deleted_by')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');

            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('deleted_by')->references('id')->on('users')->onUpdate('cascade');

            $table->timestamps();

            $table->softDeletes();
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
