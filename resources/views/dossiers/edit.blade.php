@extends('layouts.app')

@section('title', 'Modifier Dossier')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-black dark:text-gray-300 mb-8">Modifier un Dossier</h2>

    <form action="{{ route('dossiers.update', $dossier->id) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="entreprise_id" class="block text-black dark:text-gray-300 font-medium mb-2">Entreprise</label>
                <select id="entreprise_id" name="entreprise_id"
                    class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('entreprise_id') border-red-500 @enderror">
                    <option value="">Sélectionnez une Entreprise</option>
                    @foreach ($entreprises as $entreprise)
                        <option value="{{ $entreprise->id }}"
                            {{ old('entreprise_id', $dossier->entreprise_id) == $entreprise->id ? 'selected' : '' }}>
                            {{ $entreprise->NomClient }}
                        </option>
                    @endforeach
                </select>
                @error('entreprise_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="Dossier" class="block text-black dark:text-gray-300 font-medium mb-2">Nom du Dossier</label>
                <input type="text" id="Dossier" name="Dossier" value="{{ old('Dossier', $dossier->Dossier) }}"
                    class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('Dossier') border-red-500 @enderror"
                    placeholder="Entrez le nom du dossier">
                @error('Dossier')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="Annee" class="block text-black dark:text-gray-300 font-medium mb-2">Année</label>
                <input type="number" id="Annee" name="Annee" value="{{ old('Annee', $dossier->Annee) }}"
                    min="2000" max="2100"
                    class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('Annee') border-red-500 @enderror"
                    placeholder="Entrez l'année">
                @error('Annee')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-black dark:text-gray-300 font-medium mb-2">Description</label>
                <textarea id="description" name="description" rows="5"
                    class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('description') border-red-500 @enderror"
                    placeholder="Entrez la description">{{ old('description', $dossier->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex items-center gap-4 max-w-md">
            <button type="submit"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Mettre à jour
            </button>
            <a href="{{ route('dossiers.index') }}"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection