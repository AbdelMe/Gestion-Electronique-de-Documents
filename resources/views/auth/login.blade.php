@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="container-fluid ">
    <div class="row g-0 min-vh-100 justify-content-center align-items-center">
        <!-- Left Side with Image (hidden on mobile) -->
        <div class="col-md-5 d-none d-md-block" style="height: 500px;"> <!-- Fixed height -->
            <div class="h-100 bg-cover" style="background-image: url('{{ asset("assets/images/document-management.jpg") }}'); background-position: center; background-size: cover;">
                <div class="h-100 d-flex align-items-center justify-content-center" style="background-color: rgba(0, 0, 0, 0.2);">
                    <div class="text-white px-4 text-center">
                        <h2 class="h4 fw-bold mb-3">Bienvenue</h2>
                        <p class="small opacity-75">Connectez-vous pour continuer votre visite</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side with Compact Login Form -->
        <div class="col-md-4 col-10">
            <div class="p-4  rounded shadow-sm" style="max-width: 400px;">
                <div class="text-center mb-4">
                    <h3 class="h5 fw-bold text-primary mb-1">Sign In</h3>
                    <p class="small text-muted">Entrez vos coordonnées ci-dessous</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- @if($errors->any())
                        <div class="alert alert-danger small py-2 mb-3">
                            @foreach ($errors->all() as $error)
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-exclamation-circle-fill me-2 small"></i>
                                    <span>{{ $error }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif --}}
                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="email" class="form-label small fw-semibold">{{ __('Email') }}</label>
                        <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" 
                               name="email" id="email" placeholder="your@email.com" 
                               value="{{ old('email') }}" autofocus autocomplete="email">
                        @error('email')
                            <div class="invalid-feedback small">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!-- Password Input -->
                    <div class="mb-3">
                        <label for="password" class="form-label small fw-semibold">{{ __('Password') }}</label>
                        <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" 
                               name="password" id="password" placeholder="••••••••" autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback small">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="d-flex justify-content-between align-items-center mb-3 small">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" 
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-muted" for="remember">
                                {{ __('Remember me') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none text-primary">
                                {{ __('Forgot?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <button class="btn btn-primary w-100 btn-sm py-2 mb-3 fw-semibold" type="submit">
                        {{ __('Login') }}
                    </button>

                    <!-- Registration Link -->
                    <div class="text-center small">
                        <p class="text-muted mb-0">No account? 
                            <a href="{{ route('register') }}" class="text-decoration-none text-primary">
                                {{ __('Register') }}
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection