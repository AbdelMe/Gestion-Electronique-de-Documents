@extends('layouts.app')

@section('title', 'Roles')

@section('alert')
    @if (session('updated'))
        <x-toast-success-alert message="{{ session('updated') }}" />
    @endif
    @if (session('deleted'))
        <x-toast-delete-alert message="{{ session('deleted') }}" />
    @endif
    @if (session('Added'))
        <x-toast-success-alert message="{{ session('Added') }}" />
    @endif
    @if (session('warning'))
        <x-toast-warning-alert message="{{ session('warning') }}" />
    @endif
@endsection

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Liste des Rôles</h2>
        <div class="flex space-x-2">
            <a href="{{ route('roles.revokeRole') }}"
            class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700  dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                <i class="bi bi-plus-lg mr-2"></i> Revoke Rôle
            </a>
    
            <a href="{{ route('roles.assignRole') }}"
            class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700  dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                <i class="bi bi-person-plus mr-2"></i> Assigner Rôle
            </a>
        </div>
    </div>
    

    <div class="overflow-x-auto bg-white rounded-lg shadow-md dark:border-gray-800 dark:bg-white/[0.03]">
        <table class="min-w-full text-sm text-gray-800">
            <thead>
                <tr class="border-b dark:border-gray-800 dark:text-white">
                    <th class="px-6 py-4 text-left font-semibold">#</th>
                    <th class="px-6 py-4 text-left font-semibold">Nom du Rôle</th>
                    <th class="px-6 py-4 text-center font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($roles as $role)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-900 border-b dark:border-gray-800 dark:text-white">
                        <td class="px-6 py-4 border-b dark:border-gray-800">{{ $role->id }}</td>
                        <td class="px-6 py-4 border-b dark:border-gray-800">{{ $role->name }}</td>
                        <td class="px-6 py-4 border-b dark:border-gray-800 text-center">
                            <div class="flex justify-center gap-2">
                                {{-- Edit --}}
                                <a href="{{ route('roles.edit', $role->id) }}"
                                    class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-600 rounded-full text-xs hover:bg-blue-200">
                                    <i class="bi bi-pencil-square mr-1"></i> Modifier
                                </a>
                                {{-- Delete --}}
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce rôle ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center px-2 py-1 bg-red-100 text-red-600 rounded-full text-xs hover:bg-red-200">
                                        <i class="bi bi-trash3-fill mr-1"></i> Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div class="mt-4">
        {{ $roles->links() }}
    </div> --}}
</div>
@endsection
