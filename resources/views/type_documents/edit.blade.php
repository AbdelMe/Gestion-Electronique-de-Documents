@extends('layouts.app')

@section('title', 'Modifier Type Document')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4 text-white">Modifier Type Document</h2>

        <form action="{{ route('type_documents.update', $typeDocument->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="TypeDocument" class="text-white">Type Document</label>
                        <input type="text" class="form-control text-white @error('TypeDocument') is-invalid @enderror" id="TypeDocument" name="TypeDocument" value="{{ old('TypeDocument', $typeDocument->TypeDocument) }}" placeholder="Entrez le type de document" required>
                        @error('TypeDocument')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="DureeVie" class="text-white">Dureé (année)</label>
                        <input type="number" class="form-control text-white @error('DureeVie') is-invalid @enderror" id="DureeVie" name="DureeVie" value="{{ old('DureeVie', $typeDocument->DureeVie) }}" placeholder="Entrez la durée de vie en années" required>
                        @error('DureeVie')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div> --}}
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Mettre à jour</button>
                <a href="{{ route('type_documents.index') }}" class="btn btn-primary">Annuler</a>
            </div>
        </form>
    </div>
@endsection