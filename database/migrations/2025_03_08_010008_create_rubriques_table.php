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
        Schema::create('rubriques', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_rubrique_id');
            $table->unsignedBigInteger('type_document_id');
            $table->string('Rubrique');
            $table->foreign('type_rubrique_id')->references('id')->on('type_rubriques');
            $table->foreign('type_document_id')->references('id')->on('type_documents');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rubriques');
    }
};
