@extends('layouts.app')

@section('title', 'Modifier Entreprise')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-gray-700 mb-6">Modifier Entreprise</h2>

    <form action="{{ route('entreprise.update', $entreprise->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="max-w-md">
            <label for="NomClient" class="block text-gray-700 font-medium mb-2">Nom Client</label>
            <input type="text" id="NomClient" name="NomClient"
                value="{{ old('NomClient', $entreprise->NomClient) }}"
                placeholder="Entrez le nom du client"
                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('NomClient') border-red-500 @enderror">
            @error('NomClient')
                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4 max-w-md">
            <button type="submit"
                class="inline-flex items-center justify-center px-6 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md transition">
                Mettre à jour
            </button>
            <a href="{{ route('entreprise.index') }}"
                class="inline-flex items-center justify-center px-6 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium rounded-md transition">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection
