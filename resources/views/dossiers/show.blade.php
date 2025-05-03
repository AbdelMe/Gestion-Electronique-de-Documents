@extends('layouts.app')

@section('title', 'Documents du Dossier')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4 dark:text-white">Les documents dans ce dossier</h1>

    @if(count($documents) > 0)
    <div class="flex items-center gap-2 mb-6">
        {{-- <img src="{{ asset('assets/images/icons/document.png') }}" alt="Document Icon" width="28" height="28"> --}}
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
            {{ count($documents) }} document(s)
        </span>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($documents as $document)
            <div class="bg-white px-4 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 h-auto dark:border-gray-800 dark:bg-gray-800">
                <div class="px-3 py-2 pb-3 flex justify-between items-center border-b dark:border-gray-700 dark:bg-gray-800">
                    <div class="w-10 h-10 flex items-center justify-center">
                        @php
                            $extension = pathinfo($document->CheminDocument, PATHINFO_EXTENSION);
                            $icon = match($extension) {
                                'pdf' => 'bi-file-earmark-pdf',
                                'doc', 'docx' => 'bi-file-earmark-word',
                                'xls', 'xlsx' => 'bi-file-earmark-excel',
                                'jpg', 'jpeg', 'png', 'gif' => 'bi-file-earmark-image',
                                default => 'bi-file-earmark'
                            };
                        @endphp
                        <img src="{{ asset('assets/images/icons/file (1).png') }}" width="30px" alt="Document Icon">
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('documents.show', $document->id) }}" class="text-blue-500 hover:text-blue-700" title="Voir">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <form action="{{ route('documents.destroy', $document->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce Document ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700" title="Supprimer">
                                <i class="bi bi-trash3-fill"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="p-2">
                    <h3 class="text-base font-semibold text-gray-800 mb-1 dark:text-gray-300">{{ $document->titre }}</h3>
                    <div class="flex items-center text-xs text-gray-500 mb-2 dark:text-gray-300">
                        <i class="bi bi-calendar mr-1"></i>
                        <span>{{ $document->Date }}</span>
                    </div>
                </div>

                <div class="px-3 py-2 pt-3 flex justify-center gap-2 border-t dark:border-gray-700 dark:bg-gray-800">
                    <a href="{{ $document->CheminDocument ? asset('storage/' . $document->CheminDocument) : '#' }}" 
                        class="inline-flex items-center px-2 py-1 border border-blue-500 rounded-xl text-xs font-medium text-blue-500 hover:bg-blue-50 dark:hover:bg-white/[0.05]">
                        <i class="bi bi-download mr-1"></i> Télécharger
                    </a>
                    <a href="{{ route('documents.show', $document->id) }}" 
                        class="inline-flex items-center px-2 py-1 border border-gray-500 rounded-xl text-xs font-medium text-gray-500 hover:bg-gray-50 dark:hover:bg-white/[0.05]">
                        <i class="bi bi-eye mr-1"></i> Prévisualiser
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    @else
        <div class="bg-blue-50 border border-blue-200 text-blue-700 px-4 text-center py-3 rounded-xl dark:text-gray-300 dark:bg-gray-800">
            Aucun document disponible dans ce dossier.
        </div>
    @endif
</div>
@endsection
