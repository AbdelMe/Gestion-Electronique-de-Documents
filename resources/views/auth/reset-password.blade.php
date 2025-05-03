@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<div class="container-fluid">
    <div class="row g-0 min-vh-100 justify-content-center align-items-center">
        <div class="col-md-5 d-none d-md-block" style="height: 500px;">
            <div class="h-100 bg-cover" style="background-image: url('{{ asset("assets/images/document-management.jpg") }}'); background-position: center; background-size: cover;">
                <div class="h-100 d-flex align-items-center justify-content-center" style="background-color: rgba(0, 0, 0, 0.2);">
                    <div class="text-white px-4 text-center">
                        <h2 class="h4 fw-bold mb-3">Réinitialiser le mot de passe</h2>
                        <p class="small opacity-75">Entrez votre nouveau mot de passe ci-dessous</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-10">
            <div class="p-4 rounded shadow-sm" style="max-width: 400px;">
                <div class="text-center mb-4">
                    <h3 class="h5 fw-bold text-primary mb-1">Nouveau mot de passe</h3>
                    <p class="small text-muted">Veuillez entrer votre adresse email et un nouveau mot de passe</p>
                </div>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-3">
                        <label for="email" class="form-label small fw-semibold">{{ __('Email') }}</label>
                        <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror"
                               name="email" id="email" value="{{ old('email', $email ?? '') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback small">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label small fw-semibold">{{ __('New Password') }}</label>
                        <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror"
                               name="password" id="password" required autocomplete="new-password">
                        @error('password')
                            <div class="invalid-feedback small">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label small fw-semibold">{{ __('Confirm Password') }}</label>
                        <input type="password" class="form-control form-control-sm"
                               name="password_confirmation" id="password-confirm" required autocomplete="new-password">
                    </div>

                    <button type="submit" class="btn btn-primary w-100 btn-sm py-2 mb-3 fw-semibold">
                        {{ __('Reset Password') }}
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
