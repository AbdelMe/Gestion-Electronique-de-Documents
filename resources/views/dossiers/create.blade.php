@extends('layouts.app')
@section('title','Creé Dossier')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Ajouter New Dossier</h2>
    <form action="{{ route('dossiers.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="entreprise_id">Entreprise</label>
                    <select name="entreprise_id" id="entreprise_id" class="form-control @error('entreprise_id') is-invalid @enderror text-white" >
                        <option value="" disabled selected>Select Entreprise</option>
                        @foreach($entreprises as $entreprise)
                            <option value="{{ $entreprise->id }}" {{ old('entreprise_id') == $entreprise->id ? 'selected' : '' }}>
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
                    <label for="Dossier">Dossier Name</label>
                    <input type="text" class="form-control @error('Dossier') is-invalid @enderror text-white" id="Dossier" name="Dossier" value="{{ old('Dossier') }}" >
                    @error('Dossier')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="Annee">Year</label>
                    <input type="number" class="form-control @error('Annee') is-invalid @enderror text-white" id="Annee" name="Annee" value="{{ old('Annee') }}" min="2000" max="2100">
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
                         value="{{ old('description') }}"
                        ></textarea>
                    {{-- <input type="text" class="form-control @error('description') is-invalid @enderror text-white" id="description" name="description" value="{{ old('description') }}" > --}}
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div> 

        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Créer Dossier</button>
            <a href="{{ route('dossiers.index') }}" class="btn btn-primary">Annuler</a>
        </div>
    </form>
</div>
@endsection