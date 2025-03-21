@extends('layouts.app')
@section('title', 'Rubrique Document')
@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Créer Rubrique Document</h2>

        <form action={{ route('rubrique_document.store') }} method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="rubrique_id">Rubrique</label>
                        <select class="form-control text-white @error('rubrique_id') is-invalid @enderror"
                            id="rubrique_id" name="rubrique_id" required style="overflow-y: hidden;">
                            <option value="">Sélectionnez un rubrique</option>
                            @foreach ($rubriques as $rubrique)
                                <option value="{{ $rubrique->id }}"
                                    {{ old('rubrique_id') == $rubrique->id ? 'selected' : '' }}>
                                    {{ $rubrique->Rubrique }}
                                </option>
                            @endforeach
                        </select>
                        @error('rubrique_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="document_id">Document</label>
                        <select class="form-control text-white @error('document_id') is-invalid @enderror"
                            id="document_id" name="document_id" required style="overflow-y: hidden;">
                            <option value="">Sélectionnez un document</option>
                            @foreach ($documents as $document)
                                <option value="{{ $document->id }}"
                                    {{ old('document_id') == $document->id ? 'selected' : '' }}>
                                    {{ $document->LibelleDocument }}
                                </option>
                            @endforeach
                        </select>
                        @error('document_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Créer Rubrique Document</button>
            </div>
        </form>
    </div>
@endsection
