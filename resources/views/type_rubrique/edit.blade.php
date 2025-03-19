@extends('layouts.app')

@section('title', 'Modifier Type Rubrique')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Modifier Type Rubrique</h2>

        <form action="{{ route('type_rubrique.update', $typeRubrique->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Use PUT or PATCH for updates -->

            <div class="row">
                <!-- Type Rubrique Dropdown -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="TypeRubrique">Type Rubrique</label>
                        <select class="form-control text-white @error('TypeRubrique') is-invalid @enderror" id="TypeRubrique" name="TypeRubrique" required style="overflow-y: hidden;">
                            <option value="">Sélectionnez un type</option>
                            <option value="text" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'text' ? 'selected' : '' }}>Text</option>
                            <option value="number" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'number' ? 'selected' : '' }}>Number</option>
                            <option value="date" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'date' ? 'selected' : '' }}>Date</option>
                            <option value="datetime-local" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'datetime-local' ? 'selected' : '' }}>Date and Time (Local)</option>
                            <option value="time" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'time' ? 'selected' : '' }}>Time</option>
                            <option value="month" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'month' ? 'selected' : '' }}>Month</option>
                            <option value="week" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'week' ? 'selected' : '' }}>Week</option>
                            <option value="email" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'email' ? 'selected' : '' }}>Email</option>
                            <option value="tel" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'tel' ? 'selected' : '' }}>Telephone</option>
                            <option value="file" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'file' ? 'selected' : '' }}>File</option>
                            <option value="image" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'image' ? 'selected' : '' }}>Image</option>
                        </select>
                        @error('TypeRubrique')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- TailleRubrique -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="TailleRubrique">Taille Rubrique</label>
                        <input type="number" class="form-control @error('TailleRubrique') is-invalid @enderror text-white" id="TailleRubrique" name="TailleRubrique" value="{{ old('TailleRubrique', $typeRubrique->TailleRubrique) }}" placeholder="Entrez la taille de la rubrique">
                        @error('TailleRubrique')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Date -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Date">Date</label>
                        <input type="number" class="form-control @error('Date') is-invalid @enderror text-white" id="Date" name="Date" value="{{ old('Date', $typeRubrique->Date) }}" placeholder="Entrez la date">
                        @error('Date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Booleane -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Booleane">Booleane</label>
                        <select class="form-control @error('Booleane') is-invalid @enderror text-white" id="Booleane" name="Booleane" required>
                            <option value="">Sélectionnez une option</option>
                            <option value="1" {{ old('Booleane', $typeRubrique->Booleane) == 1 ? 'selected' : '' }}>Oui</option>
                            <option value="0" {{ old('Booleane', $typeRubrique->Booleane) == 0 ? 'selected' : '' }}>Non</option>
                        </select>
                        @error('Booleane')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Largeur -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Largeur">Largeur</label>
                        <input type="number" class="form-control @error('Largeur') is-invalid @enderror text-white" id="Largeur" name="Largeur" value="{{ old('Largeur', $typeRubrique->Largeur) }}" placeholder="Entrez la largeur">
                        @error('Largeur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Hauteur -->
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Hauteur">Hauteur</label>
                        <input type="number" class="form-control @error('Hauteur') is-invalid @enderror text-white" id="Hauteur" name="Hauteur" value="{{ old('Hauteur', $typeRubrique->Hauteur) }}" placeholder="Entrez la hauteur">
                        @error('Hauteur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>
    </div>
@endsection