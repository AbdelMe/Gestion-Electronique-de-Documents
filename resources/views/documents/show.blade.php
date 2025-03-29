@extends('layouts.app')

@section('title', 'Document Details')

@section('content')
    <div class="container">
        <h2 class="mb-4 text-start">Document Details</h2>

        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">{{ $document->titre }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Left Column - Document Information -->
                    <div class="col-md-6 border-end">
                        <div class="document-info">
                            <h5 class="mb-4 text-primary"><i class="fas fa-file-alt me-2"></i>Document Information</h5>
                            
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-bold">Type:</label>
                                <div class="col-sm-8">
                                    <p class="form-control-plaintext">{{ $document->typeDocument->TypeDocument ?? 'N/A' }}</p>
                                </div>
                            </div>
                            
                            @if($document->CheminDocument)
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-bold">Document:</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $document->CheminDocument) }}" target="_blank" 
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye me-1"></i> View Document
                                    </a>
                                </div>
                            </div>
                            @endif
                            
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-bold">Date:</label>
                                <div class="col-sm-8">
                                    <p class="form-control-plaintext">{{ $document->Date }}</p>
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-bold">Metadata:</label>
                                <div class="col-sm-8">
                                    <p class="form-control-plaintext">{{ $document->metadata ?? 'N/A' }}</p>
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-bold">Dossier:</label>
                                <div class="col-sm-8">
                                    <p class="form-control-plaintext">{{ $document->dossier->Dossier ?? 'N/A' }}</p>
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-bold">Entreprise:</label>
                                <div class="col-sm-8">
                                    <p class="form-control-plaintext">{{ $document->entreprise->NomClient ?? 'N/A' }}</p>
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-bold">Status:</label>
                                <div class="col-sm-8">
                                    <span class="badge bg-{{ $document->etat->color ?? 'secondary' }}">
                                        {{ $document->etat->etat ?? 'N/A' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Rubriques -->
                    <div class="col-md-6">
                        <h5 class="mb-4 text-primary"><i class="fas fa-tags me-2"></i>Document Rubriques</h5>
                        
                        @if(count($document->rubriqueDocuments) > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Rubrique</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($document->rubriqueDocuments as $rubriqueDocument)
                                            <tr>
                                                <td class="fw-bold">{{ $rubriqueDocument->rubrique->Rubrique ?? 'N/A' }}</td>
                                                <td>
                                                    @if(isset($rubriqueDocument->Valeur) && strlen($rubriqueDocument->Valeur) > 50)
                                                        <span class="d-inline-block text-truncate" style="max-width: 200px;" 
                                                              data-bs-toggle="tooltip" title="{{ $rubriqueDocument->Valeur }}">
                                                            {{ substr($rubriqueDocument->Valeur, 0, 50) }}...
                                                        </span>
                                                    @else
                                                        {{ $rubriqueDocument->Valeur ?? 'N/A' }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i> No rubriques associated with this document.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('documents.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left me-2"></i>Back to List
                </a>
                <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-warning ms-2">
                    <i class="fas fa-edit me-2"></i>Edit
                </a>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Enable tooltips
        $(document).ready(function(){
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
    @endpush
@endsection