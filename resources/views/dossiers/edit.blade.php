@extends('layouts.app')

@section('title')
    Modifier Dossier
@endsection

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
                                class="form-control @error('service_id') is-invalid @enderror">
                            <option value="" disabled>Select Service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}" 
                                    {{ old('service_id', $dossier->service_id) == $service->id ? 'selected' : '' }}>
                                    {{ $service->service }}
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
                        <label for="dossier">Nom du Dossier</label>
                        <input type="text" 
                               class="form-control @error('dossier') is-invalid @enderror" 
                               id="dossier" 
                               name="dossier" 
                               value="{{ old('dossier', $dossier->dossier) }}"
                               placeholder="Nom du dossier">
                        @error('dossier')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group mb-3">
                        <label for="année">Année</label>
                        <input type="number" 
                               class="form-control @error('année') is-invalid @enderror" 
                               id="année" 
                               name="année" 
                               value="{{ old('année', $dossier->année) }}"
                               min="2000" 
                               max="2100">
                        @error('année')
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