@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
<div class="container-fluid">
    <div class="row g-0 min-vh-100 justify-content-center align-items-center">
        <!-- Left Side with Image (hidden on mobile) -->
        <div class="col-md-5 d-none d-md-block" style="height: 500px;">
            <div class="h-100 bg-cover" style="background-image: url('{{ asset("assets/images/document-management.jpg") }}'); background-position: center; background-size: cover;">
                <div class="h-100 d-flex align-items-center justify-content-center" style="background-color: rgba(0, 0, 0, 0.2);">
                    <div class="text-white px-4 text-center">
                        <h2 class="h4 fw-bold mb-3">Mot de passe oublié ?</h2>
                        <p class="small opacity-75">Entrez votre adresse e-mail pour recevoir un lien de réinitialisation.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side with Reset Form -->
        <div class="col-md-4 col-10">
            <div class="p-4 rounded shadow-sm" style="max-width: 400px;">
                <div class="text-center mb-4">
                    <h3 class="h5 fw-bold text-primary mb-1">Mot de passe oublié</h3>
                    <p class="small text-muted">Nous vous enverrons un lien de réinitialisation</p>
                </div>

                @if (session('status'))
                    <div class="alert alert-success small py-2 mb-3">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="email" class="form-label small fw-semibold">{{ __('Email') }}</label>
                        <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror"
                               name="email" id="email" placeholder="your@email.com"
                               value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback small">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100 btn-sm py-2 mb-3 fw-semibold">
                        {{ __('Send Password Reset Link') }}
                    </button>

                    <div class="text-center small">
                        <a href="{{ route('login') }}" class="text-decoration-none text-muted">
                            ← Retour à la connexion
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
