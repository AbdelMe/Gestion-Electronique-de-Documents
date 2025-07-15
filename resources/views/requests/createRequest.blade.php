@extends('layouts.app')

@section('title', 'Ajouter une Request')
@section('alert')
    @if (session('updated'))
        <x-toast-success-alert message="{{ session('updated') }}" />
    @endif
    @if (session('deleted'))
        <x-toast-delete-alert message="{{ session('deleted') }}" />
    @endif
    @if (session('Added'))
        <x-toast-success-alert message="{{ session('Added') }}" />
    @endif
    @if (session('warning'))
        <x-toast-warning-alert message="{{ session('warning') }}" />
    @endif
@endsection

@section('content')
@if(auth()->user()->is_admin != 1 && auth()->user()->is_archivist != 1)
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-gray-700 mb-6 dark:text-gray-300">
        Demande de Permission | Consultation | Téléchargement | Création de Documents
    </h2>

    <form action="{{ route('requests.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="max-w-md">
            <label for="type" class="block text-gray-700 font-medium mb-2 dark:text-gray-300">Type de Demande</label>
            <select id="type" name="type" required
                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700">
                <option value="" disabled selected>-- Sélectionnez le type --</option>
                <option value="permission">Permission</option>
                <option value="consulting">Consultation</option>
                <option value="downloading">Téléchargement</option>
                <option value="creating">Création de documents</option>
            </select>
        </div>

        <div class="max-w-md">
            <label for="name" class="block text-gray-700 font-medium mb-2 dark:text-gray-300">Nom / Ressource concernée</label>
            <input type="text" id="name" name="name" required
                placeholder="Ex: Permission or Consultation Pour Docs..."
                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700">
        </div>

        <div class="max-w-md">
            <label for="description" class="block text-gray-700 font-medium mb-2 dark:text-gray-300">Description</label>
            <textarea id="description" name="description" rows="4"
                placeholder="Expliquez pourquoi vous faites cette demande..."
                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white"></textarea>
        </div>

        <div class="flex items-center gap-4 max-w-md">
            <button type="submit"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700  dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Envoyer
            </button>
            <a href="{{ route('dashboard') }}"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700  dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Annuler
            </a>
        </div>
    </form>
</div>
@endif
@endsection

