@extends('layouts.app')

@section('title', 'Créer Rubrique')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-black dark:text-gray-300 mb-6">Créer une Rubrique</h2>

    <form action="{{ route('rubrique.store') }}" method="POST" class="space-y-6">
        @csrf
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="flex items-end gap-2">
        <div class="w-full">
            <label for="type_rubrique_id" class="block text-black dark:text-gray-300 font-medium mb-2">Type Rubrique</label>
            <select id="type_rubrique_id" name="type_rubrique_id"
                class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('type_rubrique_id') border-red-500 @enderror">
                <option value="">Sélectionnez un type de rubrique</option>
                @foreach ($type_rubrique as $typeRubrique)
                    <option value="{{ $typeRubrique->id }}" {{ old('type_rubrique_id') == $typeRubrique->id ? 'selected' : '' }}>
                        {{ $typeRubrique->TypeRubrique }}
                    </option>
                @endforeach
            </select>
            @error('type_rubrique_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <a href="{{ route('type_rubrique.create') }}"
           class="p-2 text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-300"
           title="Créer un type de rubrique">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
        </a>
    </div>

    <div class="flex items-end gap-2">
        <div class="w-full">
            <label for="type_document_id" class="block text-black dark:text-gray-300 font-medium mb-2">Type Document</label>
            <select id="type_document_id" name="type_document_id"
                class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('type_document_id') border-red-500 @enderror">
                <option value="">Sélectionnez un type de document</option>
                @foreach ($type_documents as $typeDocument)
                    <option value="{{ $typeDocument->id }}" {{ old('type_document_id') == $typeDocument->id ? 'selected' : '' }}>
                        {{ $typeDocument->TypeDocument }}
                    </option>
                @endforeach
            </select>
            @error('type_document_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <a href="{{ route('type_documents.create') }}"
           class="p-2 text-green-600 hover:text-green-800 dark:text-green-400 dark:hover:text-green-300"
           title="Créer un type de document">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
        </a>
    </div>
</div>


        <div class="max-w-md">
            <label for="Rubrique" class="block text-black dark:text-gray-300 font-medium mb-2">Rubrique</label>
            <input type="text" id="Rubrique" name="Rubrique" value="{{ old('Rubrique') }}"
                class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('Rubrique') border-red-500 @enderror"
                placeholder="Entrez le nom de la rubrique">
            @error('Rubrique')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4 max-w-md">
            <button type="submit"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Créer Rubrique
            </button>
            <a href="{{ route('rubrique.index') }}"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection