@extends('layouts.app')

@section('title', 'Modifier Rubrique')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-gray-700 mb-6">Modifier Rubrique</h2>

    <form action="{{ route('rubrique.update', $rubrique->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Type Rubrique -->
            <div>
                <label for="type_rubrique_id" class="block text-gray-700 font-medium mb-2">Type Rubrique</label>
                <select id="type_rubrique_id" name="type_rubrique_id"
                    class="w-full border-2 border-gray-300 rounded-md px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('type_rubrique_id') border-red-500 @enderror">
                    <option value="">Sélectionnez un type de rubrique</option>
                    @foreach ($type_rubrique as $typeRubrique)
                        <option value="{{ $typeRubrique->id }}" {{ $rubrique->type_rubrique_id == $typeRubrique->id ? 'selected' : '' }}>
                            {{ $typeRubrique->TypeRubrique }}
                        </option>
                    @endforeach
                </select>
                @error('type_rubrique_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Type Document -->
            <div>
                <label for="type_document_id" class="block text-gray-700 font-medium mb-2">Type Document</label>
                <select id="type_document_id" name="type_document_id"
                    class="w-full border-2 border-gray-300 rounded-md px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('type_document_id') border-red-500 @enderror">
                    <option value="">Sélectionnez un type de document</option>
                    @foreach ($type_documents as $typeDocument)
                        <option value="{{ $typeDocument->id }}" {{ $rubrique->type_document_id == $typeDocument->id ? 'selected' : '' }}>
                            {{ $typeDocument->TypeDocument }}
                        </option>
                    @endforeach
                </select>
                @error('type_document_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Rubrique -->
        <div class="max-w-md">
            <label for="Rubrique" class="block text-gray-700 font-medium mb-2">Rubrique</label>
            <input type="text" id="Rubrique" name="Rubrique" value="{{ old('Rubrique', $rubrique->Rubrique) }}"
                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('Rubrique') border-red-500 @enderror">
            @error('Rubrique')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Obligatoire -->
        <div class="max-w-md">
            <label for="Obligatoire" class="block text-gray-700 font-medium mb-2">Obligatoire</label>
            <select id="Obligatoire" name="Obligatoire"
                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('Obligatoire') border-red-500 @enderror">
                <option value="">Sélectionnez une option</option>
                <option value="1" {{ $rubrique->Obligatoire == 1 ? 'selected' : '' }}>Oui</option>
                <option value="0" {{ $rubrique->Obligatoire == 0 ? 'selected' : '' }}>Non</option>
            </select>
            @error('Obligatoire')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="flex items-center gap-4 mt-6">
            <button type="submit"
                class="inline-flex items-center justify-center px-6 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md transition">
                Mettre à jour
            </button>
            <a href="{{ route('rubrique.index') }}"
                class="inline-flex items-center justify-center px-6 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium rounded-md transition">
                Annuler
            </a>
        </div>

    </form>
</div>
@endsection
