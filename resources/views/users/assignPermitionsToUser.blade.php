@extends('layouts.app')

@section('title', 'Assign Permission To User')

@section('content')
<div class="container mx-auto px-4 py-8 pt-2">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Assign Permissions to User</h2>
    </div>

    <div class="bg-white dark:bg-transparent rounded-lg p-6">
        <form method="POST" action="{{ route('users.storeAssignPermitionsToUser') }}">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <div class="lg:col-span-1">
                    <h2 class="text-lg font-medium text-gray-800 dark:text-white mb-4">User According Company</h2>
                    {{-- <label for="user" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">User</label> --}}
                    @livewire('get-users-according-to-the-company')
                </div>

                <div class="lg:col-span-3">
                    <h2 class="text-lg font-medium text-gray-800 dark:text-white mb-4">Permissions</h2>

                    <div class="space-y-6">
                        @foreach($permissions->groupBy('group') as $group => $groupPermissions)
                            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-sm font-medium text-gray-800 dark:text-gray-200 capitalize">{{ $group }} Permissions</span>
                                    <label class="inline-flex items-center text-sm text-gray-600 dark:text-gray-300">
                                        <input type="checkbox" class="select-all h-4 w-4 text-indigo-600 border-gray-300 rounded mr-2" data-group="{{ $group }}">
                                        Select All
                                    </label>
                                </div>
                                <div class="grid gap-2 sm:grid-cols-2 md:grid-cols-3">
                                    @foreach($groupPermissions as $permission)
                                        <label class="flex items-center text-sm text-gray-700 dark:text-gray-300">
                                            <input type="checkbox" 
                                                name="permissions[]" 
                                                value="{{ $permission->id }}"
                                                class="group-{{ $group }} h-4 w-4 text-indigo-600 border-gray-300 rounded mr-2 dark:bg-gray-700 dark:border-gray-600"
                                                id="permission_{{ $permission->id }}"
                                                @if(isset($selectedRole) && $selectedRole->hasPermissionTo($permission)) checked @endif
                                            >
                                            {{ ucwords(str_replace('_', ' ', $permission->name)) }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="mt-6 text-right">
                <button type="submit" 
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save Permissions
                </button>
            </div>
        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.select-all').forEach(selectAll => {
                    selectAll.addEventListener('change', function () {
                        const group = this.dataset.group;
                        const checkboxes = document.querySelectorAll('.group-' + group);
                        checkboxes.forEach(cb => cb.checked = this.checked);
                    });
                });
            });
        </script>
    </div>
</div>
@endsection
