@extends('layouts.app')

@section('title', 'Document Details')

@section('content')
    <div class="container mx-auto px-4 pb-4">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Document Details</h2>
            @if (auth()->user()->can('create document'))
                <a href="{{ route('documents.create') }}"
                    class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700  dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Ajouter Document
                </a>
            @endif
        </div>


        <div class="bg-white rounded-lg shadow-md overflow-hidden dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="p-6">
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="md:w-1/2 md:pr-6 md:border-r md:border-gray-200 dark:md:border-gray-700">
                        <h5 class="text-lg font-semibold text-blue-600 mb-4 flex items-center ">
                            <i class="fas fa-file-alt mr-2"></i>Document Information
                        </h5>

                        <div class="space-y-4">
                            <div class="flex flex-wrap">
                                <label class="w-1/3 font-semibold text-gray-800 dark:text-gray-300">Titre de
                                    document:</label>
                                <div class="w-2/3">
                                    <p class="text-gray-800 dark:text-gray-300">{{ $document->titre ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap">
                                <label class="w-1/3 font-semibold text-gray-800 dark:text-gray-300">Type:</label>
                                <div class="w-2/3">
                                    <p class="text-gray-800 dark:text-gray-300">
                                        {{ $document->TypeDocument->TypeDocument ?? 'N/A' }}</p>
                                </div>
                            </div>

                            @if ($document->CheminDocument)
                                @php
                                    $extension = strtolower(pathinfo($document->CheminDocument, PATHINFO_EXTENSION));
                                    $fileUrl = asset('storage/' . $document->CheminDocument);
                                    $localPath = public_path('storage/' . $document->CheminDocument);
                                @endphp

                                <div class="flex flex-wrap">
                                    <label class="w-1/3 font-semibold text-gray-800 dark:text-gray-300">Document:</label>
                                    <div class="w-2/3 space-x-2">
                                        @if ($extension === 'pdf')
                                            {{-- PDF --}}
                                            <div class="flex flex-wrap gap-2 mt-4">
                                                @if (auth()->user()->can('show document'))
                                                    <a href="{{ $fileUrl }}" target="_blank"
                                                        class="inline-flex items-center px-3 py-1.5 border border-blue-500 text-blue-600 rounded-xl bg-blue-50 hover:bg-blue-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-400 transition">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                        View PDF
                                                    </a>
                                                @endif

                                                @php
                                                    App\Models\Log::create([
                                                        'document_id' => $document->id,
                                                        'user_id' => Auth::user()->id,
                                                        'date' => now(),
                                                        'action' => 'view Document',
                                                    ]);
                                                @endphp

                                                <a href="{{ route('documents.download', $document->id) }}"
                                                    class="inline-flex items-center px-3 py-1.5 border border-gray-500 text-gray-700 rounded-xl bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-300 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3" />
                                                    </svg>
                                                    Download
                                                </a>

                                                <a href="{{ $fileUrl }}"
                                                    onclick="event.preventDefault(); printPDF('{{ $fileUrl }}');"
                                                    class="inline-flex items-center px-3 py-1.5 border border-green-500 text-green-700 rounded-xl bg-green-50 hover:bg-green-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-green-400 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M6 9V2h12v7m-6 7h6a2 2 0 002-2v-3a2 2 0 00-2-2H6a2 2 0 00-2 2v3a2 2 0 002 2h6zm0 0v4m0 0H8m4 0h4" />
                                                    </svg>
                                                    Print
                                                </a>

                                            </div>
                                            {{-- @php
                                                auth()->user()->revokePermissionTo('show_document');
                                            @endphp --}}
                                        @elseif(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                            {{-- IMAGE --}}
                                            <div class="flex flex-wrap gap-2 mt-4">
                                                @if (auth()->user()->can('show_document'))
                                                    <a href="{{ $fileUrl }}" target="_self"
                                                        class="inline-flex items-center px-3 py-1.5 border border-blue-500 text-blue-600 rounded-xl bg-blue-50 hover:bg-blue-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-400 transition">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 11l-3 4L9 13l-4 5h14l-4-6z" />
                                                        </svg>
                                                        View Image
                                                    </a>
                                                @endif

                                                @php
                                                    App\Models\Log::create([
                                                        'document_id' => $document->id,
                                                        'user_id' => Auth::user()->id,
                                                        'date' => now(),
                                                        'action' => 'view Document',
                                                    ]);
                                                @endphp

                                                <a href="{{ route('documents.download', $document->id) }}"
                                                    class="inline-flex items-center px-3 py-1.5 border border-gray-500 text-gray-700 rounded-xl bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-300 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3" />
                                                    </svg>
                                                    Download
                                                </a>

                                                <a href="{{ $fileUrl }}"
                                                    onclick="event.preventDefault(); printPDF('{{ $fileUrl }}');"
                                                    class="inline-flex items-center px-3 py-1.5 border border-green-500 text-green-700 rounded-xl bg-green-50 hover:bg-green-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-green-400 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M6 9V2h12v7m-6 7h6a2 2 0 002-2v-3a2 2 0 00-2-2H6a2 2 0 00-2 2v3a2 2 0 002 2h6zm0 0v4m0 0H8m4 0h4" />
                                                    </svg>
                                                    Print
                                                </a>

                                            </div>
                                            {{-- @php
                                                auth()->user()->revokePermissionTo('show_document');
                                            @endphp --}}
                                        @elseif(in_array($extension, ['xlsx', 'xls']))
                                            {{-- Excel --}}
                                            <div class="flex flex-wrap gap-2 mt-4">
                                                @if (auth()->user()->can('show_document'))
                                                    <a href="ms-excel:ofe|u|{{ $fileUrl }}"
                                                        class="inline-flex items-center px-3 py-1.5 border border-green-500 text-green-600 rounded-xl bg-green-50 hover:bg-green-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-green-400 transition">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                        Open in Excel
                                                    </a>
                                                @endif

                                                @php
                                                    App\Models\Log::create([
                                                        'document_id' => $document->id,
                                                        'user_id' => Auth::user()->id,
                                                        'date' => now(),
                                                        'action' => 'view Document',
                                                    ]);
                                                @endphp

                                                <a href="{{ route('documents.download', $document->id) }}"
                                                    class="inline-flex items-center px-3 py-1.5 border border-gray-500 text-gray-700 rounded-xl bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-300 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3" />
                                                    </svg>
                                                    Download
                                                </a>

                                                <a href="{{ $fileUrl }}"
                                                    onclick="event.preventDefault(); printPDF('{{ $fileUrl }}');"
                                                    class="inline-flex items-center px-3 py-1.5 border border-green-500 text-green-700 rounded-xl bg-green-50 hover:bg-green-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-green-400 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M6 9V2h12v7m-6 7h6a2 2 0 002-2v-3a2 2 0 00-2-2H6a2 2 0 00-2 2v3a2 2 0 002 2h6zm0 0v4m0 0H8m4 0h4" />
                                                    </svg>
                                                    Print
                                                </a>

                                            </div>
                                            {{-- @php
                                                auth()->user()->revokePermissionTo('show_document');
                                            @endphp --}}
                                        @elseif(in_array($extension, ['docx', 'doc']))
                                            {{-- Word --}}
                                            <div class="flex flex-wrap gap-2 mt-4">
                                                @if (auth()->user()->can('show_document'))
                                                    <a href="ms-word:ofe|u|{{ $fileUrl }}"
                                                        class="inline-flex items-center px-3 py-1.5 border border-blue-500 text-blue-600 rounded-xl bg-blue-50 hover:bg-blue-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-400 transition">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                        Open in Word
                                                    </a>
                                                @endif

                                                @php
                                                    App\Models\Log::create([
                                                        'document_id' => $document->id,
                                                        'user_id' => Auth::user()->id,
                                                        'date' => now(),
                                                        'action' => 'view Document',
                                                    ]);
                                                @endphp

                                                <a href="{{ route('documents.download', $document->id) }}"
                                                    class="inline-flex items-center px-3 py-1.5 border border-gray-500 text-gray-700 rounded-xl bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-300 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3" />
                                                    </svg>
                                                    Download
                                                </a>

                                                <a href="{{ $fileUrl }}"
                                                    onclick="event.preventDefault(); printPDF('{{ $fileUrl }}');"
                                                    class="inline-flex items-center px-3 py-1.5 border border-green-500 text-green-700 rounded-xl bg-green-50 hover:bg-green-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-green-400 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M6 9V2h12v7m-6 7h6a2 2 0 002-2v-3a2 2 0 00-2-2H6a2 2 0 00-2 2v3a2 2 0 002 2h6zm0 0v4m0 0H8m4 0h4" />
                                                    </svg>
                                                    Print
                                                </a>

                                            </div>
                                            {{-- @php
                                                auth()->user()->revokePermissionTo('show_document');
                                            @endphp --}}
                                        @elseif(in_array($extension, ['pptx', 'ppt']))
                                            <!-- PowerPoint -->
                                            <div class="flex flex-wrap gap-2 mt-4">
                                                @if (auth()->user()->can('show_document'))
                                                    <a href="ms-powerpoint:ofe|u|{{ $fileUrl }}"
                                                        class="inline-flex items-center px-3 py-1.5 border border-red-500 text-red-600 rounded-xl bg-red-50 hover:bg-red-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-red-400 transition">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                        Open in PowerPoint
                                                    </a>
                                                @endif

                                                @php
                                                    App\Models\Log::create([
                                                        'document_id' => $document->id,
                                                        'user_id' => Auth::user()->id,
                                                        'date' => now(),
                                                        'action' => 'view Document',
                                                    ]);
                                                @endphp

                                                <a href="{{ route('documents.download', $document->id) }}"
                                                    class="inline-flex items-center px-3 py-1.5 border border-gray-500 text-gray-700 rounded-xl bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-300 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3" />
                                                    </svg>
                                                    Download
                                                </a>

                                                <a href="{{ $fileUrl }}"
                                                    onclick="event.preventDefault(); printPDF('{{ $fileUrl }}');"
                                                    class="inline-flex items-center px-3 py-1.5 border border-gray-500 text-gray-700 rounded-xl bg-red-50 hover:bg-red-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-300 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M6 9V2h12v7m-6 7h6a2 2 0 002-2v-3a2 2 0 00-2-2H6a2 2 0 00-2 2v3a2 2 0 002 2h6zm0 0v4m0 0H8m4 0h4" />
                                                    </svg>
                                                    Print
                                                </a>
                                            </div>
                                            {{-- @php
                                                auth()->user()->revokePermissionTo('show_document');
                                            @endphp --}}
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <div class="flex flex-wrap">
                                <label class="w-1/3 font-semibold text-gray-800 dark:text-gray-300">Date:</label>
                                <div class="w-2/3">
                                    <p class="text-gray-800 dark:text-gray-300">{{ $document->Date }}</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap">
                                <label class="w-1/3 font-semibold text-gray-800 dark:text-gray-300">Entreprise:</label>
                                <div class="w-2/3">
                                    <p class="text-gray-800 dark:text-gray-300">
                                        {{ $document->Dossier->Entreprise->NomClient ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap">
                                <label class="w-1/3 font-semibold text-gray-800 dark:text-gray-300">Dossier:</label>
                                <div class="w-2/3">
                                    <p class="text-gray-800 dark:text-gray-300">{{ $document->Dossier->Dossier ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex flex-wrap">
                                <label class="w-1/3 font-semibold text-gray-800 dark:text-gray-300">Status:</label>
                                <div class="w-2/3">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $document->Etat->color ?? 'gray' }}-100 text-{{ $document->Etat->color ?? 'gray' }}-800">
                                        {{ $document->Etat->etat ?? 'N/A' }}
                                    </span>

                                    @if ($document->Etat && $document->Etat->etat === 'Rejected' && $document->rejection_reason)
                                        <div class="mt-2 text-sm text-red-600 dark:text-red-400">
                                            <strong>Reason for rejection:</strong> {{ $document->rejection_reason }}
                                        </div>
                                    @endif
                                </div>
                            </div>


                            <div class="flex flex-wrap">
                                <label class="w-1/3 font-semibold text-gray-800 dark:text-gray-300">Créé à:</label>
                                <div class="w-2/3">
                                    <span
                                        class="text-gray-800 dark:text-gray-300">{{ $document->created_at ?? 'N/A' }}</span>
                                </div>
                            </div>

                            <div class="flex flex-wrap">
                                <label class="w-1/3 font-semibold text-gray-800 dark:text-gray-300">Versions:</label>
                                <div class="w-2/3">
                                    {{-- <script src="//unpkg.com/alpinejs" defer></script> --}}

                                    <div x-data="{ showModal: false, version: {} }">
                                        @if ($document->versions->count() > 0)
                                            <div class="space-y-2 mb-3">
                                                @foreach ($document->versions->sortByDesc('numero')->take(3) as $version)
                                                    <div @click="showModal = true; version = {{ json_encode([
                                                        'numero' => $version->numero,
                                                        'date' => $version->date->format('Y-m-d'),
                                                        'description' => $version->description ?? 'No description available',
                                                    ]) }}"
                                                        class="cursor-pointer block p-2 border border-gray-200 dark:border-gray-700 rounded-xl hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-900">
                                                        <div class="flex justify-between items-center">
                                                            <span class="font-medium text-gray-800 dark:text-gray-300">
                                                                Version {{ $version->numero }}
                                                            </span>
                                                            <small class="text-gray-500 dark:text-gray-300">
                                                                {{ $version->date->format('Y-m-d') }}
                                                            </small>
                                                        </div>
                                                        @if ($version->description)
                                                            <small class="text-gray-500 block mt-1 dark:text-gray-300">
                                                                {{ Str::limit($version->description, 50) }}
                                                            </small>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>

                                            <a href="{{ route('documents.versions', $document->id) }}"
                                                class="inline-flex items-center px-3 py-1 border border-blue-500 text-blue-600 rounded-xl hover:bg-blue-50 dark:hover:bg-gray-800">
                                                <i class="fas fa-list mr-1"></i> View All Versions
                                                ({{ $document->versions->count() }})
                                            </a>
                                        @else
                                            <span class="text-gray-500">No versions available</span>
                                        @endif

                                        <style>
                                            [x-cloak] {
                                                display: none !important;
                                            }
                                        </style>
                                        <div x-show="showModal" x-transition x-cloak
                                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                                            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 max-w-md w-full mx-2"
                                                @click.away="showModal = false">
                                                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">
                                                    Version <span x-text="version.numero"></span>
                                                </h2>
                                                <p class="text-gray-600 dark:text-gray-300 mt-2">
                                                    <strong>Date:</strong> <span x-text="version.date"></span>
                                                </p>
                                                <p class="text-gray-600 dark:text-gray-300 mt-2">
                                                    <strong>Description:</strong> <span
                                                        x-text="version.description"></span>
                                                </p>
                                                <div class="mt-4 text-right">
                                                    <button @click="showModal = false"
                                                        class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:w-1/2">
                        <h5 class="text-lg font-semibold text-blue-600 mb-4 flex items-center">
                            <i class="fas fa-tags mr-2"></i>Document Rubriques
                        </h5>

                        @if ($rub_docs->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 ">
                                    <thead class="bg-slate-100 dark:bg-gray-800">
                                        <tr>
                                            <th
                                                class="px-4 py-2 text-left text-xs font-medium text-gray-800 uppercase tracking-wider dark:text-gray-300">
                                                Rubrique</th>
                                            <th
                                                class="px-4 py-2 text-left text-xs font-medium text-gray-800 uppercase tracking-wider dark:text-gray-300">
                                                Value</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800">
                                        @foreach ($rub_docs as $rub_doc)
                                            @php
                                                $rubrique = App\Models\Rubrique::find($rub_doc->rubrique_id);
                                            @endphp
                                            <tr>
                                                <td
                                                    class="px-4 py-2 whitespace-nowrap font-semibold border-none text-gray-800 dark:text-gray-300">
                                                    {{ $rubrique->Rubrique ?? 'N/A' }}</td>
                                                <td
                                                    class="px-4 py-2 whitespace-nowrap text-gray-800 border-none dark:text-gray-300">
                                                    @if (isset($rub_doc->Valeur) && strlen($rub_doc->Valeur) > 50)
                                                        <span class="inline-block truncate max-w-xs"
                                                            title="{{ $rub_doc->Valeur }}">
                                                            {{ substr($rub_doc->Valeur, 0, 50) }}...
                                                        </span>
                                                    @else
                                                        {{ $rub_doc->Valeur ?? 'N/A' }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div
                                class="bg-blue-50 text-blue-800 p-4 rounded-xl flex items-start dark:bg-gray-800 dark:text-gray-300">
                                <i class="fas fa-info-circle mr-2 mt-1"></i>
                                <span>Aucune rubrique associée à ce document.</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="px-6 py-4 flex justify-center space-x-4">
                <a href="{{ route('documents.index') }}"
                    class="inline-flex items-center px-4 py-1 border border-blue-500 text-blue-600 rounded-xl hover:bg-blue-50 dark:hover:bg-gray-800">
                    <i class="fas fa-arrow-left mr-2"></i>Back to List
                </a>
                <a href="{{ route('documents.edit', $document->id) }}"
                    class="inline-flex items-center px-4 py-1 border border-blue-300 text-blue-600 rounded-xl hover:bg-blue-50 dark:hover:bg-gray-800">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
            </div>
        </div>
    </div>

    <script>
        function printPDF(url) {
            const iframe = document.createElement('iframe');
            iframe.style.display = 'none';
            iframe.src = url;
            document.body.appendChild(iframe);

            iframe.onload = function() {
                iframe.contentWindow.focus();
                iframe.contentWindow.print();
            };
        }
    </script>


    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tooltipElements = document.querySelectorAll('[title]');
                tooltipElements.forEach(el => {
                    new bootstrap.Tooltip(el);
                });

                document.querySelectorAll('.open-office-doc').forEach(button => {
                    button.addEventListener('click', function(event) {
                        event.preventDefault();
                        const fileUrl = this.getAttribute('data-url');

                        const link = document.createElement('a');
                        link.href = fileUrl;
                        link.download = '';
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);

                        this.nextElementSibling.style.display = 'block';

                        this.classList.remove('border-green-500', 'text-green-600',
                            'hover:bg-green-50');
                        this.classList.add('bg-green-500', 'text-white');
                        this.innerHTML =
                            `<i class="fas fa-check mr-1"></i> File downloaded - Open it now`;
                    });
                });
            });
        </script>
    @endpush
@endsection
