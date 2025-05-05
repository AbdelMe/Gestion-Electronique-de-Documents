@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
<div class="bg-gray-100 min-h-screen flex items-center justify-center p-4 overflow-hidden">
    <div class="w-full max-w-6xl bg-white shadow-md rounded-lg overflow-hidden grid md:grid-cols-2">
        <div class="hidden md:flex items-center justify-center bg-cover bg-center" 
             style="background-image: url('{{ asset("assets/images/document-management.jpg") }}')">
            <div class="bg-black bg-opacity-40 w-full h-full flex items-center justify-center p-6">
                <div class="text-white text-center">
                    <h2 class="text-xl font-semibold mb-2">Mot de passe oublié ?</h2>
                    <p class="text-sm opacity-75">Entrez votre email pour recevoir un lien de réinitialisation</p>
                </div>
            </div>
        </div>

        <div class="p-8 flex items-center justify-center">
            <div class="w-full max-w-sm">
                <h3 class="text-2xl font-bold text-blue-600 text-center mb-2">Réinitialiser le mot de passe</h3>
                <p class="text-sm text-gray-500 text-center mb-6">Nous vous enverrons un lien par email</p>

                @if (session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" 
                               class="mt-1 block w-full px-3 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                               placeholder="your@email.com" autofocus autocomplete="email">
                        @error('email')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 rounded-md text-sm font-semibold hover:bg-blue-700 transition duration-150 mb-4">
                        {{ __('Send Password Reset Link') }}
                    </button>

                    <p class="text-center text-sm text-gray-600">
                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            {{ __('Back to Login') }}
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection