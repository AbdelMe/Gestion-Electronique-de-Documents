@extends('layouts.app')
@section('title', 'Modifier une Permission')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-gray-700 mb-6 dark:text-gray-300">Modifier une Permission</h2>
    <form action="{{ route('permitions.update', $permition->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="max-w-md">
            <label for="name" class="block text-gray-700 font-medium mb-2 dark:text-gray-300">Nom de la Permission</label>
            <input type="text" id="name" name="name" value="{{ old('name', $permition->name) }}" required
                placeholder="Ex: Créer des articles"
                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700">
        </div>

        {{-- <div class="max-w-md">
            <label for="user_id" class="block text-gray-700 font-medium mb-2">Utilisateur</label>
            <select id="user_id" name="user_id" required
                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                <option value="" disabled>-- Sélectionnez un utilisateur --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $permission->user_id ? 'selected' : '' }}>
                        {{ $user->first_name }} {{ $user->last_name }}
                    </option>
                @endforeach
            </select>
        </div> --}}

        <div class="flex items-center gap-4 max-w-md">
            <button type="submit"
                class="inline-flex items-center justify-center px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-xl transition">
                Mettre à jour
            </button>
            <a href="{{ route('permitions.index') }}"
                class="inline-flex items-center justify-center px-6 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium rounded-xl transition">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection
