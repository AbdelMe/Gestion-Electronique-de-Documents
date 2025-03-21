@extends('layouts.app')

@section('title','Modifier Dossier')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Modifier Dossier</h2>

        <form action="{{ route('dossiers.update', $dossier->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="service_id">Service</label>
                        <select name="service_id" id="service_id"
                            class="form-control text-white @error('service_id') is-invalid @enderror">
                            <option value="" disabled>Select Service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}"
                                    {{ old('service_id', $dossier->service_id) == $service->id ? 'selected' : '' }}>
                                    {{ $service->Service }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="Dossier">Nom du Dossier</label>
                        <input type="text" class="form-control text-white @error('Dossier') is-invalid @enderror" id="Dossier"
                            name="Dossier" value="{{ old('Dossier', $dossier->Dossier) }}" placeholder="Nom du Dossier">
                        @error('Dossier')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="Annee">Annee</label>
                        <input type="number" class="form-control text-white @error('Annee') is-invalid @enderror" id="Annee"
                            name="Annee" value="{{ old('Annee', $dossier->Annee) }}" min="2000" max="2100">
                        @error('Annee')
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
