@extends('layouts.app')

@section('title', 'Create User')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <div class="max-w-4xl bg-white rounded-xl shadow dark:bg-gray-900">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 dark:text-gray-200">Créer un nouvel utilisateur</h2>

            <form action="{{ route('users.StoreUser') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prénom</label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}"
                                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 dark:bg-gray-800 dark:border-gray-700">
                            @error('first_name')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}"
                                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 dark:bg-gray-800 dark:border-gray-700">
                            @error('last_name')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="w-full border-2 border-gray-300 rounded-md px-4 py-2 dark:bg-gray-800 dark:border-gray-700">
                        @error('email')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mot de passe</label>
                        <input type="password" name="password"
                            class="w-full border-2 border-gray-300 rounded-md px-4 py-2 dark:bg-gray-800 dark:border-gray-700">
                        @error('password')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Téléphone</label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 dark:bg-gray-800 dark:border-gray-700">
                            @error('phone')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Entreprise</label>
                            <select name="entreprise_id"
                                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 dark:bg-gray-800 dark:border-gray-700">
                                <option value="">-- Sélectionnez une entreprise --</option>
                                @foreach ($entreprises as $entreprise)
                                    <option value="{{ $entreprise->id }}"
                                        {{ old('entreprise_id') == $entreprise->id ? 'selected' : '' }}>
                                        {{ $entreprise->NomClient }}
                                    </option>
                                @endforeach
                            </select>
                            @error('entreprise_id')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Adresse</label>
                        <input type="text" name="address" value="{{ old('address') }}"
                            class="w-full border-2 border-gray-300 rounded-md px-4 py-2 dark:bg-gray-800 dark:border-gray-700">
                        @error('address')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ville</label>
                            <input type="text" name="city" value="{{ old('city') }}"
                                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 dark:bg-gray-800 dark:border-gray-700">
                            @error('city')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Code postal</label>
                            <input type="text" name="postal_code" value="{{ old('postal_code') }}"
                                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 dark:bg-gray-800 dark:border-gray-700">
                            @error('postal_code')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image de profil</label>
                        <input type="file" name="profile_image"
                            class="w-full border-2 border-gray-300 rounded-md px-4 py-2 dark:bg-gray-800 dark:border-gray-700">
                        @error('profile_image')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit"
                            class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700  dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                            Créer l'utilisateur
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
