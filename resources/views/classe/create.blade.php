@extends('layouts.app')

@section('title','Ajouter Service')
    
@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Ajouter Service</h2>

        <form action={{ route('classe.store') }} method="POST">
            @csrf
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="classe">Classe</label>
                        <input type="text" class="form-control @error('classe') is-invalid @enderror text-white" id="classe" name="classe" value="{{ old('classe') }}" placeholder="Entrez le nom du classe">
                        @error('classe')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Créer Classe</button>
                <a href="" class="btn btn-primary">Annuler</a>
            </div>
        </form>
    </div>
@endsection