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
        Schema::create('versements', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('identifier')->nullable();
            $table->text('commentaire')->nullable();
            $table->bigInteger('montant_octroye')->default(0);
            $table->bigInteger('somme_verse')->default(0);
            $table->bigInteger('reste_apaye')->default(0);
            $table->enum('state', ['Terminé', 'En cours', 'Annulé']);
            $table->enum('status', ['Non payé', 'Paiement partiel', 'Payé']);
            $table->enum('status_news_versement', ['Non renouvelé','Renouvelé'])->default('Renouvelé');

            $table->date('end');
            $table->date('limit');
            $table->float('commission_verse');
            $table->boolean('rented')->default(false);
            $table->bigInteger('penalite')->default(0);


            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('created_by');
            $table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('versements');
    }
};
