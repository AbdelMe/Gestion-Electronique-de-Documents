@extends('layouts.app')

@section('title', 'Document Details')

@section('content')
    <div class="container">
        <h2 class="mb-4 text-start text-dark">Document Details</h2>

        <div>
            <div class="text-dark">
                <h5 class="card-title mb-0">{{ $document->titre }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 border-end">
                        <div class="document-info">
                            <h5 class="mb-4 text-primary"><i class="fas fa-file-alt me-2"></i>Document Information</h5>
                            
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-bold text-dark">Type:</label>
                                <div class="col-sm-8">
                                    <p class="form-control-plaintext">{{ $document->TypeDocument->TypeDocument ?? 'N/A' }}</p>
                                </div>
                            </div>
                            
                            @if($document->CheminDocument)
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-bold text-dark">Document:</label>
                                <div class="col-sm-8">
                                    <a href="{{ asset('storage/' . $document->CheminDocument) }}" target="_blank" 
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye me-1"></i> View Document
                                    </a>
                                </div>
                            </div>
                            @endif
                            
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-bold text-dark">Date:</label>
                                <div class="col-sm-8">
                                    <p class="form-control-plaintext">{{ $document->Date }}</p>
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-bold text-dark">Entreprise:</label>
                                <div class="col-sm-8">
                                    <p class="form-control-plaintext">{{ $document->Dossier->Entreprise->NomClient ?? 'N/A' }}</p>
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-bold text-dark">Dossier:</label>
                                <div class="col-sm-8">
                                    <p class="form-control-plaintext">{{ $document->Dossier->Dossier ?? 'N/A' }}</p>
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-bold text-dark">Status:</label>
                                <div class="col-sm-8">
                                    <span class="badge bg-{{ $document->Etat->color ?? 'secondary' }} text-dark">
                                        {{ $document->Etat->etat ?? 'N/A' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Rubriques -->
                    <div class="col-md-6">
                        <h5 class="mb-4 text-primary"><i class="fas fa-tags me-2"></i>Document Rubriques</h5>
                        
                        @if($rub_docs->count() > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="background: linear-gradient(90deg, #131d27 0%, #496683 100%)">
                                        <tr>
                                            <th class="text-light">Rubrique</th>
                                            <th class="text-light">Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rub_docs as $rub_doc)
                                            @php
                                                $rubrique = App\Models\Rubrique::find($rub_doc->rubrique_id);
                                            @endphp
                                            <tr>
                                                <td class="fw-bold text-dark">{{ $rubrique->Rubrique ?? 'N/A' }}</td>
                                                <td class="text-dark">
                                                    @if(isset($rub_doc->Valeur) && strlen($rub_doc->Valeur) > 50)
                                                        <span class="d-inline-block text-truncate" style="max-width: 200px;" 
                                                              data-bs-toggle="tooltip" title="{{ $rub_doc->Valeur }}">
                                                            {{ substr($rub_doc->Valeur, 0, 50) }}...
                                                        </span>
                                                    @else
                                                        {{ $rub_doc->Valeur ?? 'N/A' }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="text-dark">
                                            <td colspan="2">
                                                <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-outline-github ms-2">
                                                    <i class="fas fa-edit me-2"></i>Print
                                                </a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info text-dark">
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