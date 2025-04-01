@extends('layouts.app')

@section('title','Ajouter Type Document')
    
@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Ajouter Type Document</h2>

        <form action="{{ route('type_documents.store') }}" method="POST">
            @csrf
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="TypeDocument">Type Nome</label>
                        <input type="text" class="form-control @error('TypeDocument') is-invalid @enderror text-white" id="TypeDocument" name="TypeDocument" value="{{ old('TypeDocument', $type_documents->TypeDocument ?? '') }}" placeholder="Entrez le Type">
                        @error('TypeDocument')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="DureeVie">Dureé</label>
                        <input type="number" class="form-control @error('DureeVie') is-invalid @enderror text-white" id="DureeVie" name="DureeVie" value="{{ old('DureeVie', $DureeVie->DureeVie ?? '') }}" placeholder="Entrez le nom du DureeVie">
                        @error('DureeVie')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div> --}}
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Créer Type Document</button>
                <a href="{{ route('type_documents.index') }}" class="btn btn-primary">Annuler</a>
            </div>
        </form>
    </div>
@endsection