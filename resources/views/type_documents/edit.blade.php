@extends('layouts.app')

@section('title', 'Modifier Type Document')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-black dark:text-gray-300 mb-6">Modifier un Type de Document</h2>
    <form action="{{ route('type_documents.update', $typeDocument->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="max-w-md">
            <label for="TypeDocument" class="block text-black dark:text-gray-300 font-medium mb-2">Type de Document</label>
            <input type="text" id="TypeDocument" name="TypeDocument"
                value="{{ old('TypeDocument', $typeDocument->TypeDocument) }}"
                placeholder="Entrez le type de document"
                class="w-full border-2 border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:ring-1 dark:bg-gray-800 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('TypeDocument') border-red-500 @enderror"
                required>
            @error('TypeDocument')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4 max-w-md">
            <button type="submit"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Mettre à jour
            </button>
            <a href="{{ route('type_documents.index') }}"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection