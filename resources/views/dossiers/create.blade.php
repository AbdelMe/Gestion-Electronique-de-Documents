@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Dossier</h2>
    <form method="POST" action="{{ route('dossiers.store') }}">
        @csrf
        <div class="row">
            {{-- Service Selection --}}
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="service_id" >Service</label>
                    <select name="service_id" id="service_id" class="form-select bg-dark @error('service_id') is-invalid @enderror text-white" >
                        <option value="" disabled selected>Select Service</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                {{ $service->Service }}
                            </option>
                        @endforeach
                    </select>
                    @error('service_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Dossier Name --}}
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="dossier" class="form-label">Dossier Name</label>
                    <input type="text" class="form-control" id="dossier" name="dossier" value="{{ old('dossier') }}"
                        required>
                    @error('dossier')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Year Input --}}
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="annee" class="form-label">Year</label>
                    <input type="number" class="form-control" id="annee" name="annee" value="{{ old('annee') }}"
                        min="2000" max="2100" required>
                    @error('annee')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        {{-- Submit Button --}}

        <button type="submit" class="btn btn-primary">Create Dossier</button>
    </form>
</div>
@endsection