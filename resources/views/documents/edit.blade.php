@extends('layouts.app')

@section('title', 'Modifier Document')

@section('content')

    <div class="container mt-4">
        <h2 class="mb-4">Modifier Document</h2>

        <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="type_document_id">Type Document</label>
                        <select class="form-control @error('type_document_id') is-invalid @enderror text-white" id="type_document_id" name="type_document_id" required>
                            <option value="">Sélectionnez un type de document</option>
                            @foreach($typeDocuments as $typeDocument)
                                <option value="{{ $typeDocument->id }}" {{ old('type_document_id', $document->type_document_id) == $typeDocument->id ? 'selected' : '' }}>
                                    {{ $typeDocument->TypeDocument }}
                                </option>
                            @endforeach
                        </select>
                        @error('type_document_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="dossier_id">Dossier</label>
                        <select class="form-control @error('dossier_id') is-invalid @enderror text-white" id="dossier_id" name="dossier_id" required>
                            <option value="">Sélectionnez un dossier</option>
                            @foreach($dossiers as $dossier)
                                <option value="{{ $dossier->id }}" {{ old('dossier_id', $document->dossier_id) == $dossier->id ? 'selected' : '' }}>
                                    {{ $dossier->Dossier }}
                                </option>
                            @endforeach
                        </select>
                        @error('dossier_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="LibelleDocument">Libellé Document</label>
                        <input type="text" class="form-control @error('LibelleDocument') is-invalid @enderror text-white" id="LibelleDocument" name="LibelleDocument" value="{{ old('LibelleDocument', $document->LibelleDocument) }}" required>
                        @error('LibelleDocument')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="DocumentNumerique">Document Numérique</label>
                        <input type="file" class="form-control @error('DocumentNumerique') is-invalid @enderror text-white" id="DocumentNumerique" name="DocumentNumerique">
                        @if($document->DocumentNumerique)
                            <small class="text-muted">Current file: <a href="{{ asset('storage/' . $document->DocumentNumerique) }}" target="_blank">View Document</a></small>
                        @endif
                        @error('DocumentNumerique')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="CheminDocument">Chemin Document</label>
                        <input type="text" class="form-control @error('CheminDocument') is-invalid @enderror text-white" id="CheminDocument" name="CheminDocument" value="{{ old('CheminDocument', $document->CheminDocument) }}" required>
                        @error('CheminDocument')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="OCR">OCR</label>
                        <input type="text" class="form-control @error('OCR') is-invalid @enderror text-white" id="OCR" name="OCR" value="{{ old('OCR', $document->OCR) }}" required>
                        @error('OCR')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Date">Date</label>
                        <input type="date" class="form-control @error('Date') is-invalid @enderror text-white" id="Date" name="Date" value="{{ old('Date', $document->Date) }}" required>
                        @error('Date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Cote">Cote</label>
                        <input type="text" class="form-control @error('Cote') is-invalid @enderror text-white" id="Cote" name="Cote" value="{{ old('Cote', $document->Cote) }}" required>
                        @error('Cote')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Index">Index</label>
                        <input type="date" class="form-control @error('Index') is-invalid @enderror text-white" id="Index" name="Index" value="{{ old('Index', $document->Index) }}" required>
                        @error('Index')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Supprimer">Supprimer</label>
                        <select class="form-control @error('Supprimer') is-invalid @enderror text-white" id="Supprimer" name="Supprimer" required>
                            <option value="0" {{ old('Supprimer', $document->Supprimer) == 0 ? 'selected' : '' }}>No</option>
                            <option value="1" {{ old('Supprimer', $document->Supprimer) == 1 ? 'selected' : '' }}>Yes</option>
                        </select>
                        @error('Supprimer')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="EnCoursSuppression">En Cours Suppression</label>
                        <select class="form-control @error('EnCoursSuppression') is-invalid @enderror text-white" id="EnCoursSuppression" name="EnCoursSuppression" required>
                            <option value="0" {{ old('EnCoursSuppression', $document->EnCoursSuppression) == 0 ? 'selected' : '' }}>No</option>
                            <option value="1" {{ old('EnCoursSuppression', $document->EnCoursSuppression) == 1 ? 'selected' : '' }}>Yes</option>
                        </select>
                        @error('EnCoursSuppression')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Mettre à jour</button>
            </div>
        </form>
    </div>
@endsection