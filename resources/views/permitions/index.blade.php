@extends('layouts.app')

@section('title', 'Permissions')

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
<div class="container mx-auto px-4 py-8 pt-2">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Liste des Permissions</h2>
        {{-- 
        <a href="{{ route('permissions.create') }}"
            class="inline-flex items-center px-4 py-2 bg-teal-400 hover:bg-teal-500 text-white text-sm font-medium rounded-xl shadow-md dark:text-gray-950">
            <i class="bi bi-plus-lg mr-2"></i> Ajouter Permission
        </a> 
        --}}
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($permitions as $permission)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="text-lg font-semibold text-gray-800 dark:text-white mb-2">
                    {{ $permission->name }}
                </div>
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    ID: {{ $permission->id }}
                </div>

                {{-- Optional buttons --}}
                {{-- 
                <div class="mt-3 flex gap-2">
                    <a href="{{ route('permissions.edit', $permission->id) }}"
                        class="inline-flex items-center px-3 py-1 text-xs font-medium bg-blue-100 text-blue-600 rounded-full hover:bg-blue-200">
                        <i class="bi bi-pencil-square mr-1"></i> Modifier
                    </a>
                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" 
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette permission ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex items-center px-3 py-1 text-xs font-medium bg-red-100 text-red-600 rounded-full hover:bg-red-200">
                            <i class="bi bi-trash3-fill mr-1"></i> Supprimer
                        </button>
                    </form>
                </div>
                --}}
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $permitions->links() }}
    </div>
</div>
@endsection
