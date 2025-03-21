@extends('layouts.app')

@section('title', 'Créer Rubrique')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Créer Rubrique</h2>

        <form action="{{ route('rubrique.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="type_rubrique_id">Type Rubrique</label>
                        <select class="form-control text-white @error('type_rubrique_id') is-invalid @enderror"
                            id="type_rubrique_id" name="type_rubrique_id" required style="overflow-y: hidden;">
                            <option value="">Sélectionnez un type de rubrique</option>
                            @foreach ($type_rubrique as $typeRubrique)
                                <option value="{{ $typeRubrique->id }}"
                                    {{ old('type_rubrique_id') == $typeRubrique->id ? 'selected' : '' }}>
                                    {{ $typeRubrique->TypeRubrique }}
                                </option>
                            @endforeach
                        </select>
                        @error('type_rubrique_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="type_document_id">Type Document</label>
                        <select class="form-control text-white @error('type_document_id') is-invalid @enderror"
                            id="type_document_id" name="type_document_id" required style="overflow-y: hidden;">
                            <option value="">Sélectionnez un type de document</option>
                            @foreach ($type_documents as $typeDocument)
                                <option value="{{ $typeDocument->id }}"
                                    {{ old('type_document_id') == $typeDocument->id ? 'selected' : '' }}>
                                    {{ $typeDocument->TypeDocument }}
                                </option>
                            @endforeach
                        </select>
                        @error('type_document_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Rubrique">Rubrique</label>
                        <input type="text" class="form-control text-white @error('Rubrique') is-invalid @enderror"
                            id="Rubrique" name="Rubrique" value="{{ old('Rubrique') }}" required>
                        @error('Rubrique')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Obligatoire">Obligatoire</label>
                        <select class="form-control text-white @error('Obligatoire') is-invalid @enderror" id="Obligatoire"
                            name="Obligatoire" required>
                            <option value="">Sélectionnez une option</option>
                            <option value="1" {{ old('Obligatoire') == 1 ? 'selected' : '' }}>Oui</option>
                            <option value="0" {{ old('Obligatoire') == 0 ? 'selected' : '' }}>Non</option>
                        </select>
                        @error('Obligatoire')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Créer Rubrique</button>
            </div>
        </form>
    </div>
@endsection