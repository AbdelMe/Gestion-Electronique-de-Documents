<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ __('Register') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-6xl bg-white shadow-md rounded-lg overflow-hidden grid md:grid-cols-2">

        <div class="hidden md:flex items-center justify-center bg-cover bg-center" 
             style="background-image: url('{{ asset("assets/images/document-management.jpg") }}')">
            <div class="bg-black bg-opacity-40 w-full h-full flex items-center justify-center p-6">
                <div class="text-white text-center">
                    <h2 class="text-xl font-semibold mb-2">Rejoignez notre communauté</h2>
                    <p class="text-sm opacity-75">Commencez votre aventure avec nous dès aujourd'hui</p>
                </div>
            </div>
        </div>

        <div class="p-8 flex items-center justify-center">
            <div class="w-full max-w-md">
                <h3 class="text-2xl font-bold text-blue-600 text-center mb-2">Create Account</h3>
                <p class="text-sm text-gray-500 text-center mb-6">Fill in your details to get started</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-3 py-2 rounded mb-4 text-sm">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}"
                                   class="mt-1 block w-full px-3 py-2 border @error('first_name') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500"
                                   required>
                            @error('first_name')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}"
                                   class="mt-1 block w-full px-3 py-2 border @error('last_name') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500"
                                   required>
                            @error('last_name')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="mt-1 block w-full px-3 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500"
                               required>
                        @error('email')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password"
                               class="mt-1 block w-full px-3 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500"
                               required>
                        @error('password')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500"
                               required>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                                class="w-full bg-blue-600 text-white py-2 rounded-md text-sm font-semibold hover:bg-blue-700 transition duration-150">
                            Register Now
                        </button>
                    </div>

                    <p class="text-center text-sm text-gray-600 mt-4">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Sign In</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
