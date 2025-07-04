@extends('layouts.app')

@section('title', 'Ajouter une Request')

@section('content')
<div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold text-gray-700 mb-6 dark:text-gray-300">Request Permission | consulting | Downloading | Making Documents</h2>

    <form action="" method="POST" class="space-y-6">
        @csrf

        <div class="max-w-md">
            <label for="name" class="block text-gray-700 font-medium mb-2 dark:text-gray-300">Nom de Role</label>
            <input type="text" id="name" name="name" required
                placeholder="Ex: Gérer les utilisateurs"
                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700">
        </div>

        {{-- <div class="max-w-md">
            <label for="user_id" class="block text-gray-700 font-medium mb-2 dark:text-gray-300">Utilisateur</label>
            <select id="user_id" name="user_id" required
            class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700">
            <option value="" selected disabled>-- Sélectionnez un utilisateur --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                @endforeach
            </select>
        </div> --}}

        <div class="flex items-center gap-4 max-w-md">
            <button type="submit"
                class="inline-flex items-center justify-center px-6 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-xl transition">
                Enregistrer
            </button>
            <a href=""
                class="inline-flex items-center justify-center px-6 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium rounded-xl transition">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection
