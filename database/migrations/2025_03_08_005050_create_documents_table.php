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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->date('Date');
            $table->string('metadata');
            $table->string('tag');
            $table->string('CheminDocument');
            $table->unsignedBigInteger('etat_id');
            $table->unsignedBigInteger('classe_id');
            $table->unsignedBigInteger('dossier_id');
            $table->unsignedBigInteger('type_document_id');
            // $table->string('Cote');
            // $table->date('Index');
            // $table->integer('Supprimer');
            // $table->integer('EnCoursSuppression');
            $table->foreign('etat_id')->references('id')->on('etats');
            $table->foreign('classe_id')->references('id')->on('classes');
            $table->foreign('dossier_id')->references('id')->on('dossiers');
            $table->foreign('type_document_id')->references('id')->on('type_documents');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
