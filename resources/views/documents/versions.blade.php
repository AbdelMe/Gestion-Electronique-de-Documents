@extends('layouts.app')

@section('title', 'Document Versions - ' . $document->titre)

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
<div x-data="versionViewer()" class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">
            <i class="bi bi-clock-history me-2 text-gray-400"></i> Versions pour : {{ $document->titre }}
        </h2>
        <a href="{{ route('documents.show', $document->id) }}" 
           class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700  dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
            <i class="bi bi-arrow-left mr-2 text-white"></i> Retour au document
        </a>
    </div>
    <div class="overflow-x-auto bg-white rounded-lg shadow-md dark:border-gray-800 dark:bg-white/[0.03]">
        <table class="min-w-full text-sm text-gray-800 dark:text-white">
            <thead>
                <tr class="border-b dark:border-gray-800 dark:text-white">
                    <th class="px-6 py-4 text-left font-semibold">Version #</th>
                    <th class="px-6 py-4 text-left font-semibold">Date</th>
                    <th class="px-6 py-4 text-left font-semibold">Description</th>
                    <th class="px-6 py-4 text-center font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($versions as $version)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-900 border-b dark:border-gray-800 dark:text-white">
                        <td class="px-6 py-4">{{ $version->numero }}</td>
                        <td class="px-6 py-4">{{ $version->date->format('M d, Y') }}</td>
                        <td class="px-6 py-4">
                            @if($version->description)
                                {{ $version->description }}
                            @else
                                <span class="text-gray-500">Aucune description</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="#"
                                   @click.prevent="fetchVersion({{ $version->id }})"
                                   class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-600 rounded-full text-xs hover:bg-blue-200">
                                    <i class="bi bi-eye-fill mr-1 text-gray-400"></i> Voir
                                </a>
                                @if(auth()->user()->can('update', $document))
                                    <a href="{{ route('versions.edit', [$document->id, $version->id]) }}" 
                                       class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-600 rounded-full text-xs hover:bg-blue-200">
                                        <i class="bi bi-pencil-square mr-1 text-gray-400"></i> Modifier
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $versions->links() }}
    </div>
    @can('create', App\Models\Version::class)
        <div class="mt-6 text-right">
            <a href="{{ route('versions.create', $document->id) }}" 
               class="inline-flex items-center px-4 py-2 bg-teal-400 hover:bg-teal-500 text-white text-sm font-medium rounded-md shadow-md">
                <i class="bi bi-plus-lg mr-2 text-gray-400"></i> Nouvelle Version
            </a>
        </div>
    @endcan
    <div x-show="showModal" x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white dark:bg-gray-800 w-full max-w-lg p-6 rounded shadow-lg">
            <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Détails de la version</h2>
            <div class="space-y-2 text-gray-700 dark:text-gray-300">
                <p><strong>Version #:</strong> <span x-text="version.numero"></span></p>
                <p><strong>Date:</strong> <span x-text="version.date"></span></p>
                <p><strong>Description:</strong> <span x-text="version.description || 'Aucune description'"></span></p>
            </div>
            <div class="mt-4 text-right">
                <button @click="showModal = false"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-1 rounded-xl">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script>
    function versionViewer() {
        return {
            showModal: false,
            version: {},
            fetchVersion(id) {
                fetch(`/api/version/${id}`)
                    .then(res => res.json())
                    .then(data => {
                        this.version = data;
                        this.showModal = true;
                    })
                    .catch(error => {
                        alert("Erreur lors du chargement de la version.");
                        console.error(error);
                    });
            }
        }
    }
</script>
@endsection
