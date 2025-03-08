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
            $table->unsignedBigInteger('type_document_id');
            $table->string('LibelleDocument');
            $table->string('DocumentNumerique')->nullable();
            $table->string('CheminDocument');
            $table->string('OCR');
            $table->date('Date');
            $table->string('Cote');
            $table->date('Index');
            $table->unsignedBigInteger('dossier_id');
            $table->integer('Supprimer');
            $table->integer('EnCoursSuppression');
            $table->foreign('type_document_id')->references('id')->on('type_documents');
            $table->foreign('dossier_id')->references('id')->on('dossiers');
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
