@extends('layouts.app')

@section('title','Modifier Dossier')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Modifier Dossier</h2>

        <form action="{{ route('dossiers.update', $dossier->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="entreprise_id">entreprise</label>
                        <select name="entreprise_id" id="entreprise_id"
                            class="form-control text-white @error('entreprise_id') is-invalid @enderror">
                            <option value="" disabled>Select Entreprise</option>
                            @foreach ($entreprises as $entreprise)
                                <option value="{{ $entreprise->id }}"
                                    {{ old('entreprise', $dossier->entreprise_id) == $entreprise->id ? 'selected' : '' }}>
                                    {{ $entreprise->NomClient }}
                                </option>
                            @endforeach
                        </select>
                        @error('entreprise_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Dossier">Nom du Dossier</label>
                        <input type="text" class="form-control text-white @error('Dossier') is-invalid @enderror" id="Dossier"
                            name="Dossier" value="{{ old('Dossier', $dossier->Dossier) }}" placeholder="Nom du Dossier">
                        @error('Dossier')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Annee">Annee</label>
                        <input type="number" class="form-control text-white @error('Annee') is-invalid @enderror" id="Annee"
                            name="Annee" value="{{ old('Annee', $dossier->Annee) }}" min="2000" max="2100">
                        @error('Annee')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror text-white"
                             name="description" rows="5"
                            >{{ old('description', $dossier->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Mettre à jour</button>
                <a href="{{ route('dossiers.index') }}" class="btn btn-primary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
