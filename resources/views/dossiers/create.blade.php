@extends('layouts.app')
@section('title','Creé Dossier')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Create New Dossier</h2>
    <form action="{{ route('dossiers.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="service_id">Service</label>
                    <select name="service_id" id="service_id" class="form-control @error('service_id') is-invalid @enderror text-white" >
                        <option value="" disabled selected>Select Service</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                {{ $service->Service }}
                            </option>
                        @endforeach
                    </select>
                    @error('service_id')
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
        </div> 

        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Create Dossier</button>
        </div>
    </form>
</div>
@endsection