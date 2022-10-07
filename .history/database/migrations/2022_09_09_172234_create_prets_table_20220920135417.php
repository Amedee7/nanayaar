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
        Schema::create('prets', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('numb_cli');
            $table->float('montant_demande');
            $table->dateTime('date_demande_pret');
            $table->dateTime('date_remboursement_pret');
            $table->enum('status', ['Accepté', 'Rejeté', 'En attente'])->default('En attente');

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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prets');
    }
};
