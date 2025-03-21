@extends('layouts.app')

@section('title', 'Ajouter Type Rubrique')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Ajouter Type Rubrique</h2>

        <form action="{{ route('type_rubrique.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="TypeRubrique">Type Rubrique</label>
                        <select class="form-control text-white @error('TypeRubrique') is-invalid @enderror" id="TypeRubrique" name="TypeRubrique" required style="overflow-y: hidden;">
                            <option value="">Sélectionnez un type</option>
                            <option value="text">Text</option>
                            <option value="number">Number</option>
                            <option value="date">Date</option>
                            <option value="datetime-local">Date and Time (Local)</option>
                            <option value="time">Time</option>
                            <option value="month">Month</option>
                            <option value="week">Week</option>
                            <option value="email">Email</option>
                            {{-- <option value="password">Password</option> --}}
                            <option value="tel">Telephone</option>
                            {{-- <option value="url">URL</option> --}}
                            {{-- <option value="search">Search</option> --}}
                            {{-- <option value="checkbox">Checkbox</option> --}}
                            {{-- <option value="radio">Radio</option> --}}
                            <option value="file">File</option>
                            <option value="image">Image</option>
                        </select>
                        @error('TypeRubrique')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="TailleRubrique">Taille Rubrique</label>
                        <input type="number" class="form-control @error('TailleRubrique') is-invalid @enderror text-white" id="TailleRubrique" name="TailleRubrique" value="{{ old('TailleRubrique') }}" placeholder="Entrez la taille de la rubrique">
                        @error('TailleRubrique')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Date">Date</label>
                        <input type="number" class="form-control @error('Date') is-invalid @enderror text-white" id="Date" name="Date" value="{{ old('Date') }}" placeholder="Entrez la date">
                        @error('Date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Booleane">Booleane</label>
                        <select class="form-control @error('Booleane') is-invalid @enderror text-white" id="Booleane" name="Booleane" required>
                            <option value="">Sélectionnez une option</option>
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
                        @error('Booleane')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Largeur">Largeur</label>
                        <input type="number" class="form-control @error('Largeur') is-invalid @enderror text-white" id="Largeur" name="Largeur" value="{{ old('Largeur') }}" placeholder="Entrez la largeur">
                        @error('Largeur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Hauteur">Hauteur</label>
                        <input type="number" class="form-control @error('Hauteur') is-invalid @enderror text-white" id="Hauteur" name="Hauteur" value="{{ old('Hauteur') }}" placeholder="Entrez la hauteur">
                        @error('Hauteur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Ajouter</button>
            </div>
        </form>
    </div>

@endsection