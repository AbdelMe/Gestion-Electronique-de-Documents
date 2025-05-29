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
                <i class="bi bi-dash-lg mr-2"></i> Revoke Rôle
            </a>
    
            <a href="{{ route('roles.assignRole') }}"
            class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700  dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                <i class="bi bi-person-plus mr-2"></i> Assigner Rôle
            </a>
        </div>
    </div>
    

    <div class="overflow-x-auto bg-transparent rounded-lg dark:border-gray-800">
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach ($roles as $role)
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-4">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">
                {{ $role->name }}
            </h3>

            <p class="text-sm text-gray-500 dark:text-gray-300 mb-4">
                Rôle ID: {{ $role->id }}
            </p>

            {{-- <div class="flex justify-between items-center">
                <a href="{{ route('roles.edit', $role->id) }}"
                    class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-xs hover:bg-blue-200">
                    <i class="bi bi-pencil-square mr-1"></i> Modifier
                </a>

                <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce rôle ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs hover:bg-red-200">
                        <i class="bi bi-trash3-fill mr-1"></i> Supprimer
                    </button>
                </form>
            </div> --}}
        </div>
    @endforeach
</div>

    </div>

    {{-- <div class="mt-4">
        {{ $roles->links() }}
    </div> --}}
</div>
@endsection
