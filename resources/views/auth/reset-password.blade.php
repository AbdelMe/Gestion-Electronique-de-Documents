@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<div class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-6xl bg-white shadow-md rounded-lg overflow-hidden grid md:grid-cols-2">
        
        <div class="hidden md:flex items-center justify-center bg-cover bg-center" 
             style="background-image: url('{{ asset('assets/images/document-management.jpg') }}')">
            <div class="bg-black bg-opacity-40 w-full h-full flex items-center justify-center p-6">
                <div class="text-white text-center">
                    <h2 class="text-xl font-semibold mb-2">Réinitialisation</h2>
                    <p class="text-sm opacity-75">Entrez votre nouveau mot de passe ci-dessous</p>
                </div>
            </div>
        </div>

        <div class="p-8 flex items-center justify-center">
            <div class="w-full max-w-sm">
                <h3 class="text-2xl font-bold text-blue-600 text-center mb-2">Nouveau mot de passe</h3>
                <p class="text-sm text-gray-500 text-center mb-6">Veuillez entrer votre email et votre nouveau mot de passe</p>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email', $email ?? '') }}"
                               class="mt-1 block w-full px-3 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                               required autofocus>
                        @error('email')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
                        <input id="password" type="password" name="password"
                               class="mt-1 block w-full px-3 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                               required autocomplete="new-password">
                        @error('password')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password-confirm" class="block text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                        <input id="password-confirm" type="password" name="password_confirmation"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                               required autocomplete="new-password">
                    </div>

                    <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 rounded-md text-sm font-semibold hover:bg-blue-700 transition duration-150">
                        Réinitialiser le mot de passe
                    </button>

                    <p class="text-center text-sm text-gray-600 mt-4">
                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                            ← Retour à la connexion
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
