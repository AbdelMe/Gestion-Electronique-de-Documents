<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id('IDEntreprise');
            $table->string('RaisonSocial');
            $table->string('NomClient');
            $table->string('Adresse');
            $table->string('Ville')->nullable();
            $table->string('Tel')->nullable();
            $table->string('Fax')->nullable();
            $table->string('Email')->nullable();
            $table->string('TP')->nullable();
            $table->string('RegistreCommerce')->nullable();
            $table->string('IdentificationFiscale')->nullable();
            $table->string('CNSS')->nullable();
            $table->string('ICE')->nullable();
            $table->string('Observation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
