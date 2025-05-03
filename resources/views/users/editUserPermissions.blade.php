@extends('layouts.app')

@section('title', 'Edit Role Permissions')

@section('content')
    <div class="container mx-auto px-4 py-8">
        {{-- <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Edit User Permissions: {{ $user->first_name }} {{ $user->last_name }}</h1>
        <a href="{{ route('users.showUserPermissions') }}" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition">
            Back to Users
        </a>
    </div> --}}
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Edit User Permissions For:
                    {{ $user->first_name }} {{ $user->last_name }}</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Manage which permissions are assigned to this User
                </p>
            </div>
            <a href="{{ route('users.showUserPermissions') }}"
                class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition">
                Back to Users
            </a>
        </div>

        <div class="bg-white dark:bg-transparent rounded-lg overflow-hidden">
            <form method="POST" action="{{ route('users.updateUserPermissions', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 p-6">
                    <div class="lg:col-span-1">
                        <h2 class="text-lg font-medium text-gray-800 dark:text-white mb-4">Role Information</h2>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Role
                            Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->first_name) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            required disabled>
                    </div>

                    <div class="lg:col-span-3">
                        <h2 class="text-lg font-medium text-gray-800 dark:text-white mb-4">Permissions</h2>

                        <div class="space-y-6">
                            @php
                                $directPermissions = $user->getDirectPermissions()->pluck('id')->toArray();
                            @endphp

                            @foreach ($permissions as $group => $groupPermissions)
                                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
                                    <div class="flex items-center justify-between mb-3">
                                        <span
                                            class="text-sm font-medium text-gray-800 dark:text-gray-200 capitalize">{{ $group }}
                                            Permissions</span>
                                        <label class="inline-flex items-center text-sm text-gray-600 dark:text-gray-300">
                                            <input type="checkbox"
                                                class="select-all h-4 w-4 text-indigo-600 border-gray-300 rounded mr-2"
                                                data-group="{{ $group }}">
                                            Select All
                                        </label>
                                    </div>

                                    <div class="grid gap-2 sm:grid-cols-2 md:grid-cols-3">
                                        @foreach ($groupPermissions as $permission)
                                            @php
                                                $isDirect = in_array($permission->id, $directPermissions);
                                                $hasPermission = $user->hasPermissionTo($permission);
                                            @endphp

                                            <label class="flex items-center text-sm text-gray-700 dark:text-gray-300">
                                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                                    id="permission_{{ $permission->id }}"
                                                    class="group-{{ $group }} h-4 w-4 text-indigo-600 border-gray-300 rounded mr-2 dark:bg-gray-700 dark:border-gray-600"
                                                    {{ $hasPermission ? 'checked' : '' }}
                                                    {{ !$isDirect && $hasPermission ? 'disabled' : '' }}>
                                                <span
                                                    class="{{ !$isDirect && $hasPermission ? 'text-red-500 italic' : '' }}">
                                                    {{ ucwords(str_replace('_', ' ', $permission->name)) }}
                                                    @if (!$isDirect && $hasPermission)
                                                        (via role)
                                                    @endif
                                                </span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>

                <div class="px-6 py-4 bg-gray-50 dark:bg-transparent text-right">
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update User Permissions
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.select-all').forEach(selectAll => {
                selectAll.addEventListener('change', function() {
                    const group = this.dataset.group;
                    const checkboxes = document.querySelectorAll('.group-' + group);
                    checkboxes.forEach(cb => cb.checked = this.checked);
                });
            });
        });
    </script>
@endsection
