@extends('layouts.app')

@section('title','Modifier Service')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Modifier Service</h2>

        <form action="{{ route('services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="entreprise_id">Entreprise</label>
                        <select name="entreprise_id" id="entreprise_id" class="form-control @error('entreprise_id') is-invalid @enderror text-white">
                            <option value="" disabled selected>Sélectionner une entreprise</option>
                            @foreach ($entreprises as $entreprise)
                                <option value="{{ $entreprise->id }}" {{ old('entreprise_id', $service->entreprise_id) == $entreprise->id ? 'selected' : '' }}>
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
                        <label for="Service">Service</label>
                        <input type="text" class="form-control @error('Service') is-invalid @enderror text-white" id="Service" name="Service" value="{{ old('Service', $service->Service) }}" placeholder="Entrez le nom du service">
                        @error('Service')
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