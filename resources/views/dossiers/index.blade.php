@extends('layouts.app')

@section('title', 'Dossiers')

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
    <div class="min-h-screen py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900">Liste des dossiers</h2>
                    <p class="text-gray-500 text-sm mt-1">Gérez tous vos dossiers en un seul endroit</p>
                </div>
                <a href="{{ route('dossiers.create') }}" class="mt-3 sm:mt-0 inline-flex items-center px-3 py-1.5 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-sm transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Nouveau
                </a>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($dossiers as $dossier)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200 overflow-hidden hover:bg-gray-50">
                        <!-- Card Content -->
                        <div class="p-4">
                            <div class="flex items-start">
                                <div class="p-2 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                    </svg>
                                </div>
                                <div class="ml-3 flex-1">
                                    <h3 class="text-sm font-medium text-gray-900 leading-tight">{{ $dossier->Dossier }}</h3>
                                    <p class="text-xs text-gray-500 mt-0.5">{{ $dossier->Annee }}</p>
                                </div>
                            </div>

                            <div class="mt-3 space-y-1.5">
                                <div class="flex items-center text-xs text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0v12h8V4H6z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="truncate">{{ $dossier->entreprise->NomClient }}</span>
                                </div>
                                
                                <div class="flex items-center text-xs text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Créé le {{ $dossier->created_at->format('d/m/Y') }}</span>
                                </div>
                            </div>

                            <div class="mt-3 flex justify-between items-center pt-2 border-t border-gray-100">
                                <a href="{{ route('dossiers.show', $dossier->id) }}" class="text-xs font-medium text-blue-600 hover:text-blue-800 transition-colors">
                                    Voir
                                </a>
                                <div class="flex space-x-1">
                                    <a href="{{ route('dossiers.edit', $dossier->id) }}" class="p-1 text-gray-400 hover:text-blue-600 rounded-full hover:bg-blue-50 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('dossiers.destroy', $dossier->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce dossier ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1 text-gray-400 hover:text-red-600 rounded-full hover:bg-red-50 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $dossiers->links() }}
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Custom pagination styles -->
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
        }
        .page-item {
            margin: 0 0.15rem;
        }
        .page-link {
            display: block;
            padding: 0.35rem 0.65rem;
            font-size: 0.8rem;
            color: #4b5563;
            background-color: white;
            border-radius: 0.375rem;
            transition: all 0.2s;
        }
        .page-link:hover {
            background-color: #f3f4f6;
        }
        .page-item.active .page-link {
            background-color: #eff6ff;
            color: #2563eb;
            font-weight: 500;
        }
        .page-item.disabled .page-link {
            color: #9ca3af;
            background-color: white;
        }
    </style>
@endpush