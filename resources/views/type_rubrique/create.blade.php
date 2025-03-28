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
                        <select class="form-control text-white @error('TypeRubrique') is-invalid @enderror" id="TypeRubrique" name="TypeRubrique"  style="overflow-y: hidden;">
                            <option value="">Sélectionnez un type</option>
                            <option value="text">Text</option>
                            <option value="textarea">Long Text</option>
                            <option value="number">Number</option>
                            <option value="date">Date</option>
                            {{-- <option value="datetime-local">Date and Time (Local)</option> --}}
                            <option value="time">Time</option>
                            {{-- <option value="month">Month</option> --}}
                            {{-- <option value="week">Week</option> --}}
                            {{-- <option value="email">Email</option> --}}
                            {{-- <option value="password">Password</option> --}}
                            {{-- <option value="tel">Telephone</option> --}}
                            {{-- <option value="url">URL</option> --}}
                            {{-- <option value="search">Search</option> --}}
                            {{-- <option value="checkbox">Checkbox</option> --}}
                            {{-- <option value="radio">Radio</option> --}}
                            {{-- <option value="file">File</option> --}}
                            {{-- <option value="image">Image</option> --}}
                        </select>
                        @error('TypeRubrique')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Créer Type Rubrique</button>
                <a href="{{ route('type_rubrique.index') }}" class="btn btn-primary">Annuler</a>
            </div>
        </form>
    </div>

@endsection