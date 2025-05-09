@extends('layouts.app')

@section('title', 'Ajouter Type Rubrique')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-black dark:text-gray-300 mb-6">Ajouter un Type de Rubrique</h2>

    <form action="{{ route('type_rubrique.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="max-w-md">
            <label for="TypeRubrique" class="block text-black dark:text-gray-300 font-medium mb-2">Type Rubrique</label>
            <select id="TypeRubrique" name="TypeRubrique"
                class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('TypeRubrique') border-red-500 @enderror">
                <option value="">Sélectionnez un type</option>
                <option value="text" {{ old('TypeRubrique') == 'text' ? 'selected' : '' }}>Text</option>
                <option value="textarea" {{ old('TypeRubrique') == 'textarea' ? 'selected' : '' }}>Long Text</option>
                <option value="number" {{ old('TypeRubrique') == 'number' ? 'selected' : '' }}>Number</option>
                <option value="date" {{ old('TypeRubrique') == 'date' ? 'selected' : '' }}>Date</option>
                <option value="time" {{ old('TypeRubrique') == 'time' ? 'selected' : '' }}>Time</option>
            </select>
            @error('TypeRubrique')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4 max-w-md">
            <button type="submit"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Créer Type Rubrique
            </button>
            <a href="{{ route('type_rubrique.index') }}"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection