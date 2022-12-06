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
            $table->float('somme', 8, 2);
            $table->text('comment')->nullable();
            $table->bigInteger('amount_total')->default(0);
            $table->bigInteger('amount_payed')->default(0);
            $table->bigInteger('amount_rule')->default(0);
            $table->enum('state', ['Terminé', 'En cours', 'Annulé']);
            $table->enum('status', ['Non payé', 'Paiement partiel', 'Payé']);
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
