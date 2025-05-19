@extends('layouts.app')

@section('title', 'Contactez-nous')

@section('alert')
    @if (session('success'))
        <x-toast-success-alert message="{{ session('success') }}" />
    @endif
@endsection

@section('content')
<div class="container mx-auto px-4">
    <div class="max-w-2xl dark:bg-transparent rounded-lg p-4">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Contactez-nous</h2>

        <form action="" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Nom complet
                </label>
                <input type="text" id="name" name="name" required
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-teal-400">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Adresse email
                </label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-teal-400">
            </div>

            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                    Message
                </label>
                <textarea id="message" name="message" rows="5" required
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-md dark:bg-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-teal-400"></textarea>
            </div>

            <div class="text-left">
                <button type="submit"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                    <i class="bi bi-send-fill mr-2"></i> Envoyer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
