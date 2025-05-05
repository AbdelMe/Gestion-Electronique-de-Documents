<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ __('Login') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-6xl bg-white shadow-md rounded-lg overflow-hidden grid md:grid-cols-2">
        
        <div class="hidden md:flex items-center justify-center bg-cover bg-center" 
             style="background-image: url('{{ asset("assets/images/document-management.jpg") }}')">
            <div class="bg-black bg-opacity-40 w-full h-full flex items-center justify-center p-6">
                <div class="text-white text-center">
                    <h2 class="text-xl font-semibold mb-2">Bienvenue</h2>
                    <p class="text-sm opacity-75">Connectez-vous pour continuer votre visite</p>
                </div>
            </div>
        </div>

        <div class="p-8 flex items-center justify-center">
            <div class="w-full max-w-sm">
                <h3 class="text-2xl font-bold text-blue-600 text-center mb-2">Sign In</h3>
                <p class="text-sm text-gray-500 text-center mb-6">Entrez vos coordonnées ci-dessous</p>

                <form method="POST" action="{{ route('login') }}">
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

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" 
                               class="mt-1 block w-full px-3 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                               placeholder="••••••••" autocomplete="current-password">
                        @error('password')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between mb-4 text-sm">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600"
                                   {{ old('remember') ? 'checked' : '' }}>
                            <span class="text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">
                                {{ __('Forgot Password?') }}
                            </a>
                        @endif
                    </div>

                    <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 rounded-md text-sm font-semibold hover:bg-blue-700 transition duration-150">
                        {{ __('Login') }}
                    </button>

                    <p class="text-center text-sm text-gray-600 mt-4">
                        {{ __('No account?') }}
                        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">
                            {{ __('Register') }}
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
