@extends('layouts.app')

@section('title', 'Roles Permissions')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Roles Permissions</h1>
        <a href="{{ route('user_permissions.assignPermitionsToRole') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
            Assign permission to role
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Permissions</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($roles as $role)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $role->name }}
                                </div>
                                @if($role->is_admin)
                                    <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Admin
                                    </span>
                                @endif
                                @if($role->is_archiviste)
                                    <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                        Archiviste
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-wrap gap-2">
                                @forelse($role->permissions as $permission)
                                <div class="group relative">
                                    <span class="px-2 py-1 text-xs rounded-full bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300 flex items-center gap-1">
                                        {{ $permission->name }}
                                        <button type="button" 
                                                onclick="confirm('Are you sure you want to revoke this permission?') && document.getElementById('remove-permission-{{ $permission->id }}').submit()"
                                                class="text-gray-500 hover:text-red-500 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </span>
                                    
                                    <form id="remove-permission-{{ $permission->id }}" 
                                          action="{{ route('user_permissions.deletePermition', [$role->id, $permission->id]) }}" 
                                          method="POST" 
                                          class="hidden">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            @empty
                                <span class="text-sm text-gray-500 dark:text-gray-400">No permissions assigned</span>
                            @endforelse
                            </div>
                            @if($role->permissions->count() > 0)
                            <form method="POST" action="{{ route('user_permissions.revokeAllPermissions', $role->id) }}" 
                                class="mt-2" onsubmit="return confirm('Are you sure you want to revoke All permissions?')">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="flex items-center text-xs text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                  </svg>
                                  Revoke All
                              </button>
                          </form>
                          @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                {{-- <a href="{{ route('user_permissions.editRolePermissions', $role->id) }}" 
                                    title="Edit permissions"
                                    class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                     </svg>
                                 </a> --}}
                                 <a href="{{ route('user_permissions.editRolePermissions', $role->id) }}"
                                    class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-600 rounded-full text-xs hover:bg-blue-200">
                                    <i class="bi bi-pencil-square mr-1"></i> Modifier
                                </a>
                                {{-- <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this role?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                        Delete
                                    </button>
                                </form> --}}
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            No roles found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($roles->hasPages())
    <div class="mt-4">
        {{ $roles->links() }}
    </div>
    @endif
</div>
@endsection