@extends('layouts.app')

@section('title', 'Document Details')

@section('content')
    <div class="container">
        <h2 class="mb-4 text-start">Document Details</h2>

        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">{{ $document->LibelleDocument }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-3"><strong>ID:</strong> {{ $document->id }}</p>
                        <p class="mb-3"><strong>Type Document ID:</strong> {{ $document->type_document_id }}</p>
                        <p class="mb-3"><strong>Libellé Document:</strong> {{ $document->LibelleDocument }}</p>
                        <p class="mb-3"><strong>Document Numérique:</strong>
                            @if($document->DocumentNumerique)
                                <a href="{{ asset('storage/' . $document->DocumentNumerique) }}" target="_blank" class="text-decoration-none">View Document</a>
                            @else
                                N/A
                            @endif
                        </p>
                        <p class="mb-3"><strong>Chemin Document:</strong> {{ $document->CheminDocument }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-3"><strong>OCR:</strong> {{ $document->OCR }}</p>
                        <p class="mb-3"><strong>Date:</strong> {{ $document->Date }}</p>
                        <p class="mb-3"><strong>Cote:</strong> {{ $document->Cote }}</p>
                        <p class="mb-3"><strong>Index:</strong> {{ $document->Index }}</p>
                        <p class="mb-3"><strong>Dossier ID:</strong> {{ $document->dossier_id }}</p>
                        <p class="mb-3"><strong>Supprimer:</strong> {{ $document->Supprimer ? 'Yes' : 'No' }}</p>
                        <p class="mb-3"><strong>En Cours Suppression:</strong> {{ $document->EnCoursSuppression ? 'Yes' : 'No' }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('documents.index') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-arrow-left me-2"></i>Back to List
                </a>
            </div>
        </div>
    </div>
@endsection