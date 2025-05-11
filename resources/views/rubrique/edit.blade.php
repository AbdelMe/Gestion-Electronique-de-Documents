@extends('layouts.app')

@section('title', 'Modifier Rubrique')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-black dark:text-gray-300 mb-6">Modifier une Rubrique</h2>

    <form action="{{ route('rubrique.update', $rubrique->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="type_rubrique_id" class="block text-black dark:text-gray-300 font-medium mb-2">Type Rubrique</label>
                <select id="type_rubrique_id" name="type_rubrique_id"
                    class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('type_rubrique_id') border-red-500 @enderror">
                    <option value="">Sélectionnez un type de rubrique</option>
                    @foreach ($type_rubrique as $typeRubrique)
                        <option value="{{ $typeRubrique->id }}" {{ $rubrique->type_rubrique_id == $typeRubrique->id ? 'selected' : '' }}>
                            {{ $typeRubrique->TypeRubrique }}
                        </option>
                    @endforeach
                </select>
                @error('type_rubrique_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="type_document_id" class="block text-black dark:text-gray-300 font-medium mb-2">Type Document</label>
                <select id="type_document_id" name="type_document_id"
                    class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('type_document_id') border-red-500 @enderror">
                    <option value="">Sélectionnez un type de document</option>
                    @foreach ($type_documents as $typeDocument)
                        <option value="{{ $typeDocument->id }}" {{ $rubrique->type_document_id == $typeDocument->id ? 'selected' : '' }}>
                            {{ $typeDocument->TypeDocument }}
                        </option>
                    @endforeach
                </select>
                @error('type_document_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="max-w-md">
            <label for="Rubrique" class="block text-black dark:text-gray-300 font-medium mb-2">Rubrique</label>
            <input type="text" id="Rubrique" name="Rubrique" value="{{ old('Rubrique', $rubrique->Rubrique) }}"
                class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('Rubrique') border-red-500 @enderror"
                placeholder="Entrez le nom de la rubrique">
            @error('Rubrique')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="max-w-md">
            <label for="Obligatoire" class="block text-black dark:text-gray-300 font-medium mb-2">Obligatoire</label>
            <select id="Obligatoire" name="Obligatoire"
                class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('Obligatoire') border-red-500 @enderror">
                <option value="">Sélectionnez une option</option>
                <option value="1" {{ $rubrique->Obligatoire == 1 ? 'selected' : '' }}>Oui</option>
                <option value="0" {{ $rubrique->Obligatoire == 0 ? 'selected' : '' }}>Non</option>
            </select>
            @error('Obligatoire')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4 max-w-md">
            <button type="submit"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Mettre à jour
            </button>
            <a href="{{ route('rubrique.index') }}"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection