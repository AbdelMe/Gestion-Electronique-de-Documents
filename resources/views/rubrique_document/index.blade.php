@extends('layouts.app')

@section('title', 'Rubrique Document')

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
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Liste des Rubriques Document</h2>
        {{-- 
        <a href="{{ route('rubrique_document.create') }}"
            class="inline-flex items-center px-4 py-2 bg-teal-400 hover:bg-teal-500 text-white text-sm font-medium rounded-md shadow-md">
            <i class="bi bi-plus-lg mr-2"></i> Ajouter Rubrique Document
        </a> 
        --}}
    </div>

    <div class="overflow-x-auto bg-white rounded-lg shadow-md dark:border-gray-800 dark:bg-white/[0.03]">
        <table class="min-w-full text-sm text-gray-800">
            <thead>
                <tr class="border-b dark:border-gray-800 dark:text-white">
                    <th class="px-6 py-4 text-left font-semibold">#</th>
                    <th class="px-6 py-4 text-left font-semibold">Rubrique</th>
                    <th class="px-6 py-4 text-left font-semibold">Document</th>
                    {{-- <th class="px-6 py-4 text-left font-semibold">Valeur</th> --}}
                    <th class="px-6 py-4 text-center font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($rubs_docs as $r_d)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-900 border-b dark:border-gray-800 dark:text-white">
                        <td class="px-6 py-4">{{ $r_d->id }}</td>
                        <td class="px-6 py-4">{{ $r_d->Rubrique->Rubrique }}</td>
                        <td class="px-6 py-4">{{ $r_d->Document->titre }}</td>
                        {{-- <td class="px-6 py-4">{{ $r_d->Valeur }}</td> --}}
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('rubrique_document.edit', $r_d->id) }}"
                                    class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-600 rounded-full text-xs hover:bg-blue-200">
                                    <i class="bi bi-pencil-square mr-1"></i> Modifier
                                </a>
                                <form action="{{ route('rubrique_document.destroy', $r_d->id) }}" method="POST"
                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce Rubrique Document ?');">
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

    <div class="mt-4">
        {{ $rubs_docs->links() }}
    </div>
</div>
@endsection
