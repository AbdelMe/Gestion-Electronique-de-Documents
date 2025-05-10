@extends('layouts.app')

@section('title', 'Modifier Entreprise')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-black dark:text-gray-300 mb-6">Modifier Entreprise</h2>

    <form action="{{ route('entreprise.update', $entreprise->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="max-w-md">
            <label for="NomClient" class="block text-black dark:text-gray-300 font-medium mb-2">Nom Client</label>
            <input type="text" id="NomClient" name="NomClient"
                value="{{ old('NomClient', $entreprise->NomClient) }}"
                placeholder="Entrez le nom du client"
                class="w-full border-2 border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-1 dark:bg-gray-800 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700">
            @error('NomClient')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4 max-w-md">
            <button type="submit"
            class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700  dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Mettre à jour
            </button>
            <a href="{{ route('entreprise.index') }}"
            class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700  dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection
