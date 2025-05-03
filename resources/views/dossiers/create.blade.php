@extends('layouts.app')
@section('title','Créer Dossier')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto bg-white rounded-lg dark:bg-transparent p-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Ajouter Nouveau Dossier</h2>
        
        <form action="{{ route('dossiers.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="entreprise_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Entreprise</label>
                    <select name="entreprise_id" id="entreprise_id" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 @error('entreprise_id') border-red-500 @enderror">
                        <option value="" disabled selected>Sélectionner une entreprise</option>
                        @foreach($entreprises as $entreprise)
                            <option value="{{ $entreprise->id }}" {{ old('entreprise_id') == $entreprise->id ? 'selected' : '' }}>
                                {{ $entreprise->NomClient }}
                            </option>
                        @endforeach
                    </select>
                    @error('entreprise_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="Dossier" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom du Dossier</label>
                    <input type="text" id="Dossier" name="Dossier" value="{{ old('Dossier') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 @error('Dossier') border-red-500 @enderror">
                    @error('Dossier')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="Annee" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Année</label>
                    <input type="number" id="Annee" name="Annee" value="{{ old('Annee') }}" min="2000" max="2100"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 @error('Annee') border-red-500 @enderror">
                    @error('Annee')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2 md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('dossiers.index') }}" 
                    class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:bg-gray-600">
                    Annuler
                </a>
                <button type="submit" 
                    class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                    Créer Dossier
                </button>
            </div>
        </form>
    </div>
</div>
@endsection