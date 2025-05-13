@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <div class="flex flex-wrap rounded-xl bg-white dark:bg-transparent">
            <div
                class="w-full md:w-1/3 p-4 flex flex-col items-center text-center border-0 md:border-r md:border-gray-200 dark:md:border-gray-700">
                <div class="relative">
                    <div class="w-32 h-32 rounded-full overflow-hidden shadow-lg">
                        <img class="w-full h-full object-cover"
                    src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('assets\images\icons\user (1).png') }}"
                            alt="Profile Image">
                    </div>
                    {{-- <div class="absolute inset-0 bg-gradient-to-r from-teal-400 to-blue-500 opacity-50 rounded-full"></div> --}}
                </div>
                <div class="mt-4 text-lg font-semibold dark:text-gray-300">{{ Auth::user()->first_name }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-300">{{ Auth::user()->email }}</div>
            </div>

            <div class="w-full md:w-2/3 p-6">
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-6 flex justify-between items-center">
                        <h4 class="text-2xl font-semibold text-gray-800 dark:text-gray-300">Profile Settings</h4>
                    </div>

                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">First Name</label>
                                <input type="text" name="first_name"
                                    value="{{ old('first_name', Auth::user()->first_name) }}"
                                    class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700">
                                @error('first_name')
                                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Name</label>
                                <input type="text" name="last_name"
                                    value="{{ old('last_name', Auth::user()->last_name) }}"
                                    class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700">
                                @error('last_name')
                                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700">
                            @error('email')
                                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
                            <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}"
                                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700">
                            @error('phone')
                                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                            <input type="text" name="address" value="{{ old('address', Auth::user()->address) }}"
                                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700">
                            @error('address')
                                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">City</label>
                                <input type="text" name="city" value="{{ old('city', Auth::user()->city) }}"
                                    class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700">
                                @error('city')
                                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Postal
                                    Code</label>
                                <input type="text" name="postal_code"
                                    value="{{ old('postal_code', Auth::user()->postal_code) }}"
                                    class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700">
                                @error('postal_code')
                                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Profile Image</label>
                            <input type="file" name="profile_image"
                                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700">
                            @error('profile_image')
                                <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <button type="submit"
                        class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700  dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                            Save Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
