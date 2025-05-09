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
            $table->text('metadata');
            $table->text('tag');
            $table->string('CheminDocument')->nullable();
            $table->unsignedBigInteger('etat_id');
            $table->unsignedBigInteger('classe_id');
            $table->unsignedBigInteger('dossier_id');
            $table->unsignedBigInteger('type_document_id');
            $table->unsignedBigInteger('size')->nullable();
            
            $table->foreign('etat_id')->references('id')->on('etats')->onDelete('cascade');
            $table->foreign('classe_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('dossier_id')->references('id')->on('dossiers')->onDelete('cascade');
            $table->foreign('type_document_id')->references('id')->on('type_documents')->onDelete('cascade');
            
            $table->timestamps();
            $table->softDeletes();
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
