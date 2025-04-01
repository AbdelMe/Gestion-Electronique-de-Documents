
@extends('layouts.app')

@section('title', 'Show Dossier')

@section('content')
<h1 class="text-dark">Les documents dans ce dossier</h1>

@if(count($documents) > 0)
<p class="text-dark d-flex align-items-center">
    <img src="{{ asset('assets/images/icons/document.png') }}" width="25" height="25" alt="Document Icon" >
    <span class="badge text-bg-primary px-1 pb-1" style="font-size: 0.9rem;">
        {{ count($documents) }} document(s)
    </span>
</p>
    <div class="row g-4">
        @foreach ($documents as $document)
            <div class="col-md-6 col-lg-4 mt-2">
                <div class="card document-card h-100">
                    <div class="card-header text-white d-flex justify-content-between align-items-center" 
                         style="background: linear-gradient(90deg, #496683 0%, #131d27 100%);">
                        <div class="document-icon">
                            @php
                                $extension = pathinfo($document->CheminDocument, PATHINFO_EXTENSION);
                                $icon = match($extension) {
                                    'pdf' => 'bi-file-earmark-pdf',
                                    'doc', 'docx' => 'bi-file-earmark-word',
                                    'xls', 'xlsx' => 'bi-file-earmark-excel',
                                    'jpg', 'jpeg', 'png', 'gif' => 'bi-file-earmark-image',
                                    default => 'bi-file-earmark'
                                };
                            @endphp
                            <img src="{{ asset('assets/images/icons/file (1).png') }}" width="40px" style="margin-right: 8px" alt="Dashboard Icon">
                        </div>
                        <div class="document-actions">
                            <a href="{{ route('documents.show', $document->id) }}" 
                               class="text-white btn px-0" 
                               title="Voir">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            <form action="{{ route('documents.destroy', $document->id) }}" method="POST" 
                                  class="d-inline" 
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce Document ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn px-0" title="Supprimer">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-dark">{{ $document->titre }}</h5>
                        <div class="document-info">
                            <div class="mb-2">
                                <i class="bi bi-calendar me-2"></i>
                                <small class="text-dark">{{ $document->Date }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center" 
                         style="background: linear-gradient(90deg, #111a22 0%, #5781ac 100%)">
                        <a href="{{ $document->CheminDocument ? asset('storage/' . $document->CheminDocument) : '#' }}" 
                           class="btn btn-sm btn-outline-light me-2">
                            <i class="bi bi-download me-1"></i> Télécharger
                        </a>
                        <a href="{{ $document->CheminDocument ? asset('storage/' . $document->CheminDocument) : '#' }}" 
                           class="btn btn-sm btn-outline-dark">
                            <i class="bi bi-eye me-1"></i> Prévisualiser
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        <style>

            .documents-container {
                --card-spacing: 1.5rem;
                --card-bg: #2c3e50;
                --primary-accent: #3490dc;
                --text-color: white;
                --border-color: rgba(255, 255, 255, 0.1);
            }
        
            .documents-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: var(--card-spacing);
                margin-bottom: var(--card-spacing);
            }
            .document-card {
                display: flex;
                flex-direction: column;
                background-color: var(--card-bg);
                color: var(--text-color);
                border-radius: 10px;
                overflow: hidden;
                transition: all 0.3s ease;
                height: 100%;
            }
        
            .document-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            }
            .document-card .card-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0.75rem 1.25rem;
                border-bottom: 1px solid var(--border-color);
            }
            .document-card .card-body {
                padding: 1.25rem;
                flex-grow: 1;
            }
        
            .document-card .card-footer {
                padding: 0.75rem 1.25rem;
                border-top: 1px solid var(--border-color);
            }
        
            .document-icon {
                width: 40px;
                height: 40px;
                display: grid;
                place-items: center;
                font-size: 1.5rem;
            }
        
            .document-actions {
                display: flex;
                gap: 0.5rem;
            }
        
            .document-actions .btn {
                width: 30px;
                height: 30px;
                display: grid;
                place-items: center;
                padding: 0;
            }
        
            .document-meta {
                display: flex;
                flex-wrap: wrap;
                gap: 0.5rem;
                margin-bottom: 1rem;
            }
        
            .document-meta .badge {
                font-weight: normal;
                padding: 0.375rem 0.75rem;
            }
            .card-title {
                font-size: 1.1rem;
                margin-bottom: 0.75rem;
                line-height: 1.3;
            }
        
            .document-info {
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }
        
            .document-info small {
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }
    
            .card-footer .btn {
                padding: 0.375rem 0.75rem;
            }
    
            .page-item.active .page-link {
                background-color: var(--primary-accent);
                border-color: var(--primary-accent);
            }
        
            .page-link {
                color: var(--primary-accent);
            }
        
            .form-control,
            .form-select,
            .input-group-text {
                background-color: #343a40 !important;
                color: white !important;
                border: 1px solid #495057;
            }
        
            .form-control:focus,
            .form-select:focus {
                background-color: #495057 !important;
                color: white !important;
                border-color: #6c757d;
                box-shadow: 0 0 0 0.25rem rgba(52, 144, 220, 0.25);
            }
            @media (max-width: 768px) {
                .documents-grid {
                    grid-template-columns: 1fr;
                }
                
                .document-card {
                    max-width: 100%;
                }
            }
        </style>
    </div>
@else
    <div class="alert alert-warning text-center mt-4">
        Aucun document disponible dans ce dossier.
    </div>
@endif

@endsection

