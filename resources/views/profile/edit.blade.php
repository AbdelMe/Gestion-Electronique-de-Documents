@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="container rounded bg-black mt-5 mb-5">
        <div class="row">
            <div class="col-md-3">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <div class="profile-image-container">
                        <img class="profile-image" width="150px"
                            src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : 'https://via.placeholder.com/150' }}">

                    </div>
                    <style>
                        /* Instagram Profile Image Styling */
                        .profile-image-container {
                            position: relative;
                            width: 150px;
                            height: 150px;
                            border-radius: 50%;
                            overflow: hidden;
                            /* border: 4px solid #ff4500; */
                            /* Instagram-like gradient border */
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                            /* background: linear-gradient(45deg, #feda75, #fa7e1e, #d62976, #962fbf, #4f5bd5); */
                        }

                        /* Profile Image */
                        .profile-image {
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                            border-radius: 50%;
                            border: 2px solid #fff;
                        }
                    </style>

                    <span class="font-weight-bold mt-3">{{ Auth::user()->first_name }}</span>
                    <span class="text-muted">{{ Auth::user()->email }}</span>
                </div>
            </div>


            <div class="col-md-9">
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">First Name</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                    name="first_name" value="{{ old('first_name', Auth::user()->first_name) }}">
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                    name="last_name" value="{{ old('last_name', Auth::user()->last_name) }}">
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email', Auth::user()->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label class="labels">Phone Number</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone', Auth::user()->phone) }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-3">
                                <label class="labels">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" value="{{ old('address', Auth::user()->address) }}">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">City</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                                    value="{{ old('city', Auth::user()->city) }}">
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Postal Code</label>
                                <input type="text" class="form-control @error('postal_code') is-invalid @enderror"
                                    name="postal_code" value="{{ old('postal_code', Auth::user()->postal_code) }}">
                                @error('postal_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Profile Image</label>
                                <input type="file" class="form-control @error('profile_image') is-invalid @enderror"
                                    name="profile_image" value="{{ old('profile_image', Auth::user()->profile_image) }}">
                                @error('profile_image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        body {
            background-color: #f8f9fa;
            /* Set background color for profile page */
        }
    </style>
@endpush