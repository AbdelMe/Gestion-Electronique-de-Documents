@extends('layouts.app')

@section('title', 'Modifier Rubrique Document')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-black dark:text-gray-300 mb-6">Modifier une Rubrique Document</h2>

    <form action="{{ route('rubrique_document.update', $rubriqueDocument->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Rubrique -->
            <div>
                <label for="rubrique_id" class="block text-black dark:text-gray-300 font-medium mb-2">Rubrique</label>
                <select id="rubrique_id" name="rubrique_id"
                    class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('rubrique_id') boreder-red-500 @enderror">
                    <option value="">Sélectionnez une rubrique</option>
                    @foreach ($rubriques as $rubrique)
                        <option value="{{ $rubrique->id }}"
                            {{ old('rubrique_id', $rubriqueDocument->rubrique_id) == $rubrique->id ? 'selected' : '' }}>
                            {{ $rubrique->Rubrique }}
                        </option>
                    @endforeach
                </select>
                @error('rubrique_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Document -->
            <div>
                <label for="document_id" class="block text-black dark:text-gray-300 font-medium mb-2">Document</label>
                <select id="document_id" name="document_id"
                    class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('document_id') border-red-500 @enderror">
                    <option value="">Sélectionnez un document</option>
                    @foreach ($documents as $document)
                        <option value="{{ $document->id }}"
                            {{ old('document_id', $rubriqueDocument->document_id) == $document->id ? 'selected' : '' }}>
                            {{ $document->titre }}
                        </option>
                    @endforeach
                </select>
                @error('document_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex items-center gap-4 max-w-md">
            <button type="submit"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Mettre à jour
            </button>
            <a href="{{ route('rubrique_document.index') }}"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection