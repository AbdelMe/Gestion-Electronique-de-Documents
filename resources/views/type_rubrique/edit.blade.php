@extends('layouts.app')

@section('title', 'Modifier Type Rubrique')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Modifier Type Rubrique</h2>

        <form action="{{ route('type_rubrique.update', $typeRubrique->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="TypeRubrique">Type Rubrique</label>
                        <select class="form-control text-white @error('TypeRubrique') is-invalid @enderror" id="TypeRubrique" name="TypeRubrique" required style="overflow-y: hidden;">
                            <option value="">Sélectionnez un type</option>
                            <option value="text" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'text' ? 'selected' : '' }}>Text</option>
                            <option value="textarea" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'textarea' ? 'selected' : '' }}>Long Text</option>
                            <option value="number" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'number' ? 'selected' : '' }}>Number</option>
                            <option value="date" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'date' ? 'selected' : '' }}>Date</option>
                            <option value="time" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'time' ? 'selected' : '' }}>Time</option>
                        </select>
                        @error('TypeRubrique')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Mettre à jour</button>
                <a href="{{ route('type_rubrique.index') }}" class="btn btn-primary">Annuler</a>
            </div>
        </form>
    </div>
@endsection