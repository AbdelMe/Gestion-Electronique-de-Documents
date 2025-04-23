@extends('layouts.app')

@section('title', 'Document Details')

@section('content')
    <div class="container">
        <h2 class="mb-4 text-start text-dark">Document Details</h2>

        <div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 border-end">
                        <div class="document-info">
                            <h5 class="mb-4 text-primary"><i class="fas fa-file-alt me-2"></i>Document Information</h5>

                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-bold text-dark">Titre de document:</label>
                                <div class="col-sm-8">
                                    <p class="form-control-plaintext">{{ $document->titre ?? 'N/A' }}</p>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-bold text-dark">Type:</label>
                                <div class="col-sm-8">
                                    <p class="form-control-plaintext">{{ $document->TypeDocument->TypeDocument ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>

                            @if ($document->CheminDocument)
                                @php
                                    $extension = strtolower(pathinfo($document->CheminDocument, PATHINFO_EXTENSION));
                                    $fileUrl = asset('storage/' . $document->CheminDocument);
                                    $localPath = public_path('storage/' . $document->CheminDocument); // Local file path
                                @endphp

                                <div class="mb-3 row">
                                    <label class="col-sm-4 col-form-label fw-bold text-dark">Document:</label>
                                    <div class="col-sm-8">
                                        @if ($extension === 'pdf')
                                            <a href="{{ $fileUrl }}" target="_blank"
                                                class="btn btn-sm btn-outline-primary me-2">
                                                <i class="fas fa-eye me-1"></i> View PDF
                                            </a>
                                            <a href="{{ route('documents.download', $document->id) }}"
                                                class="btn btn-sm btn-outline-dark">
                                                <i class="fas fa-download me-1"></i> Download
                                            </a>

                                        @elseif(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                            <a href="{{ $fileUrl }}" target="_blank"
                                                class="btn btn-sm btn-outline-primary me-2">
                                                <i class="fas fa-image me-1"></i> View Image
                                            </a>
                                            <a href="{{ route('documents.download', $document->id) }}"
                                                class="btn btn-sm btn-outline-dark">
                                                <i class="fas fa-download me-1"></i> Download
                                            </a>

                                        @elseif(in_array($extension, ['xlsx', 'xls']))
                                            <a href="ms-excel:ofe|u|{{ $fileUrl }}"
                                                class="btn btn-sm btn-outline-success">
                                                <i class="fas fa-file-excel me-1"></i> Open in Excel
                                            </a>
                                            <a href="{{ route('documents.download', $document->id) }}"
                                                class="btn btn-sm btn-outline-dark">
                                                <i class="fas fa-download me-1"></i> Download
                                            </a>

                                        @elseif(in_array($extension, ['docx', 'doc']))
                                            <a href="ms-word:ofe|u|{{ $fileUrl }}"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-file-word me-1"></i> Open in Word
                                            </a>
                                            <a href="{{ route('documents.download', $document->id) }}"
                                                class="btn btn-sm btn-outline-dark">
                                                <i class="fas fa-download me-1"></i> Download
                                            </a>

                                        @elseif(in_array($extension, ['pptx', 'ppt']))
                                            <a href="ms-powerpoint:ofe|u|{{ $fileUrl }}"
                                                class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-file-powerpoint me-1"></i> Open in PowerPoint
                                            </a>
                                            <a href="{{ route('documents.download', $document->id) }}"
                                                class="btn btn-sm btn-outline-dark">
                                                <i class="fas fa-download me-1"></i> Download
                                            </a>
                                        @endif
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
                                    <p class="form-control-plaintext">
                                        {{ $document->Dossier->Entreprise->NomClient ?? 'N/A' }}</p>
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
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-bold text-dark">Créé à:</label>
                                <div class="col-sm-8">
                                    <span class="text-dark">
                                        {{ $document->created_at ?? 'N/A' }}
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label fw-bold text-dark">Versions:</label>
                                <div class="col-sm-8">
                                    @if($document->versions->count() > 0)
                                        <div class="list-group mb-2">
                                            @foreach($document->versions->sortByDesc('numero')->take(3) as $version)
                                                <a href="{{ route('versions.show', [$document->id, $version->id]) }}" 
                                                   class="list-group-item list-group-item-action">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <span class="fw-medium">Version {{ $version->numero }}</span>
                                                        <small class="text-muted">{{ $version->date->format('Y-m-d') }}</small>
                                                    </div>
                                                    @if($version->description)
                                                        <small class="text-muted d-block mt-1">{{ Str::limit($version->description, 50) }}</small>
                                                    @endif
                                                </a>
                                            @endforeach
                                        </div>
                                        <!-- "See All" button that links to a dedicated versions page -->
                                        <a href="{{ route('documents.versions', $document->id) }}" 
                                           class="btn btn-sm btn-outline-primary">
                                           <i class="fas fa-list me-1"></i> View All Versions ({{ $document->versions->count() }})
                                        </a>
                                    @else
                                        <span class="text-muted">No versions available</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h5 class="mb-4 text-primary"><i class="fas fa-tags me-2"></i>Document Rubriques</h5>

                        @if ($rub_docs->count() > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="background: linear-gradient(90deg, #131d27 0%, #496683 100%)">
                                        <tr>
                                            <th class="text-light">Rubrique</th>
                                            <th class="text-light">Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rub_docs as $rub_doc)
                                            @php
                                                $rubrique = App\Models\Rubrique::find($rub_doc->rubrique_id);
                                            @endphp
                                            <tr>
                                                <td class="fw-bold text-dark">{{ $rubrique->Rubrique ?? 'N/A' }}</td>
                                                <td class="text-dark">
                                                    @if (isset($rub_doc->Valeur) && strlen($rub_doc->Valeur) > 50)
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
                                    {{-- <tfoot>
                                        <tr class="text-dark">
                                            <td colspan="2">
                                                <a href="{{ route('documents.edit', $document->id) }}"
                                                    class="btn btn-outline-github ms-2">
                                                    <i class="fas fa-edit me-2"></i>Print
                                                </a>
                                            </td>
                                        </tr>
                                    </tfoot> --}}
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info text-dark">
                                <i class="fas fa-info-circle me-2"></i> Aucune rubrique associée à ce document.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('documents.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-left me-2"></i>Back to List
                </a>
                <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-outline-info ms-2">
                    <i class="fas fa-edit me-2"></i>Edit
                </a>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('[data-bs-toggle="tooltip"]').tooltip();
            });
        </script>
    @endpush
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.open-office-doc').forEach(button => {
                    button.addEventListener('click', function(event) {
                        event.preventDefault();
                        const fileUrl = this.getAttribute('data-url');

                        const link = document.createElement('a');
                        link.href = fileUrl;
                        link.download = '';
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);

                        this.nextElementSibling.style.display = 'block';

                        this.classList.remove('btn-outline-success');
                        this.classList.add('btn-success');
                        this.innerHTML =
                            `<i class="fas fa-check me-1"></i> File downloaded - Open it now`;
                    });
                });
            });
        </script>
    @endpush

@endsection
