@extends('layouts.app')

@section('title', 'Modifier Type Rubrique')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-black dark:text-gray-300 mb-6">Modifier un Type de Rubrique</h2>

    <form action="{{ route('type_rubrique.update', $typeRubrique->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="max-w-md">
            <label for="TypeRubrique" class="block text-black dark:text-gray-300 font-medium mb-2">Type Rubrique</label>
            <select id="TypeRubrique" name="TypeRubrique"
                class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('TypeRubrique') border-red-500 @enderror"
                required>
                <option value="">Sélectionnez un type</option>
                <option value="text" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'text' ? 'selected' : '' }}>Text</option>
                <option value="textarea" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'textarea' ? 'selected' : '' }}>Long Text</option>
                <option value="number" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'number' ? 'selected' : '' }}>Number</option>
                <option value="date" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'date' ? 'selected' : '' }}>Date</option>
                <option value="time" {{ old('TypeRubrique', $typeRubrique->TypeRubrique) == 'time' ? 'selected' : '' }}>Time</option>
            </select>
            @error('TypeRubrique')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4 max-w-md">
            <button type="submit"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Mettre à jour
            </button>
            <a href="{{ route('type_rubrique.index') }}"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection