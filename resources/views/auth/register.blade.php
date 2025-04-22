@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100" style="max-width: 1000px;">
            <!-- Left Side with Image -->
            <div class="col-md-6 d-none d-md-block p-0">
                <div class="h-100 bg-cover"
                     style="background-image: url('{{ asset('assets/images/document-management.jpg') }}');
                            background-size: cover;
                            background-position: center;
                            min-height: 500px;">
                    <div class="h-100 d-flex align-items-center justify-content-center"
                         style="background-color: rgba(0, 0, 0, 0.4);">
                        <div class="text-white px-4 text-center">
                            <h2 class="h4 fw-bold mb-3">Rejoignez notre communauté</h2>
                            <p class="small opacity-75">Commencez votre aventure avec nous dès aujourd'hui</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side with Form -->
            <div class="col-md-6 bg-light d-flex align-items-center justify-content-center">
                <div class="w-100 px-4 py-4" style="max-width: 450px;">
                    <div class="text-center mb-4">
                        <h3 class="h5 fw-bold text-primary">Create Account</h3>
                        <p class="small text-muted">Fill in your details to get started</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                        @csrf

                        @if (session('error'))
                            <div class="alert alert-danger small mb-3">
                                <i class="bi bi-exclamation-circle-fill me-2"></i>
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="row g-2">
                            <!-- First Name -->
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">First Name</label>
                                <input type="text"
                                       class="form-control form-control-sm @error('first_name') is-invalid @enderror"
                                       name="first_name" value="{{ old('first_name') }}" required>
                                @error('first_name')
                                <div class="invalid-feedback small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold">Last Name</label>
                                <input type="text"
                                       class="form-control form-control-sm @error('last_name') is-invalid @enderror"
                                       name="last_name" value="{{ old('last_name') }}" required>
                                @error('last_name')
                                <div class="invalid-feedback small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-12">
                                <label class="form-label small fw-semibold">Email</label>
                                <input type="email"
                                       class="form-control form-control-sm @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <div class="invalid-feedback small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="col-12">
                                <label class="form-label small fw-semibold">Password</label>
                                <input type="password"
                                       class="form-control form-control-sm @error('password') is-invalid @enderror"
                                       name="password" required>
                                @error('password')
                                <div class="invalid-feedback small">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="col-12">
                                <label class="form-label small fw-semibold">Confirm Password</label>
                                <input type="password" class="form-control form-control-sm"
                                       name="password_confirmation" required>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary w-100 py-2 btn-sm">
                                    Register Now
                                </button>
                            </div>

                            <!-- Login Link -->
                            <div class="col-12 text-center mt-3">
                                <p class="small text-muted">Already have an account?
                                    <a href="{{ route('login') }}" class="text-primary text-decoration-none">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
