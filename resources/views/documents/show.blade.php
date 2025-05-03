@extends('layouts.app')

@section('title', 'Document Details')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 dark:text-white">Document Details</h2>

        <div class="bg-white rounded-lg shadow-md overflow-hidden dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="p-6">
                <div class="flex flex-col md:flex-row gap-6">
                    <div class="md:w-1/2 md:pr-6 md:border-r md:border-gray-200 dark:md:border-gray-700">
                        <h5 class="text-lg font-semibold text-blue-600 mb-4 flex items-center ">
                            <i class="fas fa-file-alt mr-2"></i>Document Information
                        </h5>

                        <div class="space-y-4">
                            <div class="flex flex-wrap">
                                <label class="w-1/3 font-semibold text-gray-800 dark:text-gray-300">Titre de document:</label>
                                <div class="w-2/3">
                                    <p class="text-gray-800 dark:text-gray-300">{{ $document->titre ?? 'N/A' }}</p>
                                </div>
                            </div>
                            
                            <div class="flex flex-wrap">
                                <label class="w-1/3 font-semibold text-gray-800 dark:text-gray-300">Type:</label>
                                <div class="w-2/3">
                                    <p class="text-gray-800 dark:text-gray-300">{{ $document->TypeDocument->TypeDocument ?? 'N/A' }}</p>
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
                                            <a href="{{ $fileUrl }}" target="_blank"
                                                class="inline-flex items-center px-3 py-1 border border-blue-500 text-blue-600 rounded-xl hover:bg-blue-50 dark:hover:bg-gray-800">
                                                <i class="fas fa-eye mr-1"></i> View PDF
                                            </a>
                                            <a href="{{ route('documents.download', $document->id) }}"
                                                class="inline-flex items-center px-3 py-1 border border-gray-500 text-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-800 dark:text-gray-300">
                                                <i class="fas fa-download mr-1"></i> Download
                                            </a>

                                        @elseif(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                            <a href="{{ $fileUrl }}" target="_blank"
                                                class="inline-flex items-center px-3 py-1 border border-blue-500 text-blue-600 rounded-xl hover:bg-blue-50 dark:hover:bg-gray-800">
                                                <i class="fas fa-image mr-1"></i> View Image
                                            </a>
                                            <a href="{{ route('documents.download', $document->id) }}"
                                                class="inline-flex items-center px-3 py-1 border border-gray-500 text-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-800 dark:text-gray-300">
                                                <i class="fas fa-download mr-1"></i> Download
                                            </a>

                                        @elseif(in_array($extension, ['xlsx', 'xls']))
                                            <a href="ms-excel:ofe|u|{{ $fileUrl }}"
                                                class="inline-flex items-center px-3 py-1 border border-green-500 text-green-600 rounded-xl hover:bg-green-50 dark:hover:bg-gray-800">
                                                <i class="fas fa-file-excel mr-1"></i> Open in Excel
                                            </a>
                                            <a href="{{ route('documents.download', $document->id) }}"
                                                class="inline-flex items-center px-3 py-1 border border-gray-500 text-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-800 dark:text-gray-300">
                                                <i class="fas fa-download mr-1"></i> Download
                                            </a>

                                        @elseif(in_array($extension, ['docx', 'doc']))
                                            <a href="ms-word:ofe|u|{{ $fileUrl }}"
                                                class="inline-flex items-center px-3 py-1 border border-blue-500 text-blue-600 rounded-xl hover:bg-blue-50 dark:hover:bg-gray-800">
                                                <i class="fas fa-file-word mr-1"></i> Open in Word
                                            </a>
                                            <a href="{{ route('documents.download', $document->id) }}"
                                                class="inline-flex items-center px-3 py-1 border border-gray-500 text-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-800 dark:text-gray-300">
                                                <i class="fas fa-download mr-1"></i> Download
                                            </a>

                                        @elseif(in_array($extension, ['pptx', 'ppt']))
                                            <a href="ms-powerpoint:ofe|u|{{ $fileUrl }}"
                                                class="inline-flex items-center px-3 py-1 border border-red-500 text-red-600 rounded-xl hover:bg-red-50 dark:hover:bg-gray-800">
                                                <i class="fas fa-file-powerpoint mr-1"></i> Open in PowerPoint
                                            </a>
                                            <a href="{{ route('documents.download', $document->id) }}"
                                                class="inline-flex items-center px-3 py-1 border border-gray-500 text-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-800 dark:text-gray-300">
                                                <i class="fas fa-download mr-1"></i> Download
                                            </a>
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
                                    <p class="text-gray-800 dark:text-gray-300">{{ $document->Dossier->Entreprise->NomClient ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap">
                                <label class="w-1/3 font-semibold text-gray-800 dark:text-gray-300">Dossier:</label>
                                <div class="w-2/3">
                                    <p class="text-gray-800 dark:text-gray-300">{{ $document->Dossier->Dossier ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap">
                                <label class="w-1/3 font-semibold text-gray-800 dark:text-gray-300">Status:</label>
                                <div class="w-2/3">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $document->Etat->color ?? 'gray' }}-100 text-{{ $document->Etat->color ?? 'gray' }}-800">
                                        {{ $document->Etat->etat ?? 'N/A' }}
                                    </span>
                                </div>
                            </div>

                            <div class="flex flex-wrap">
                                <label class="w-1/3 font-semibold text-gray-800 dark:text-gray-300">Créé à:</label>
                                <div class="w-2/3">
                                    <span class="text-gray-800 dark:text-gray-300">{{ $document->created_at ?? 'N/A' }}</span>
                                </div>
                            </div>

                            <div class="flex flex-wrap">
                                <label class="w-1/3 font-semibold text-gray-800 dark:text-gray-300">Versions:</label>
                                <div class="w-2/3">
                                    @if($document->versions->count() > 0)
                                        <div class="space-y-2 mb-3">
                                            @foreach($document->versions->sortByDesc('numero')->take(3) as $version)
                                                <a href="{{ route('versions.show', [$document->id, $version->id]) }}" 
                                                   class="block p-2 border border-gray-200 dark:border-none rounded-xl hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-900">
                                                    <div class="flex justify-between items-center">
                                                        <span class="font-medium text-gray-800 dark:text-gray-300">Version {{ $version->numero }}</span>
                                                        <small class="text-gray-500 dark:text-gray-300">{{ $version->date->format('Y-m-d') }}</small>
                                                    </div>
                                                    @if($version->description)
                                                        <small class="text-gray-500 block mt-1 dark:text-gray-300">{{ Str::limit($version->description, 50) }}</small>
                                                    @endif
                                                </a>
                                            @endforeach
                                        </div>
                                        <a href="{{ route('documents.versions', $document->id) }}" 
                                           class="inline-flex items-center px-3 py-1 border border-blue-500 text-blue-600 rounded-xl hover:bg-blue-50 dark:hover:bg-gray-800">
                                           <i class="fas fa-list mr-1"></i> View All Versions ({{ $document->versions->count() }})
                                        </a>
                                    @else
                                        <span class="text-gray-500">No versions available</span>
                                    @endif
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
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-800 uppercase tracking-wider dark:text-gray-300">Rubrique</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-800 uppercase tracking-wider dark:text-gray-300">Value</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800">
                                        @foreach ($rub_docs as $rub_doc)
                                            @php
                                                $rubrique = App\Models\Rubrique::find($rub_doc->rubrique_id);
                                            @endphp
                                            <tr>
                                                <td class="px-4 py-2 whitespace-nowrap font-semibold text-gray-800 dark:text-gray-300">{{ $rubrique->Rubrique ?? 'N/A' }}</td>
                                                <td class="px-4 py-2 whitespace-nowrap text-gray-800 dark:text-gray-300">
                                                    @if (isset($rub_doc->Valeur) && strlen($rub_doc->Valeur) > 50)
                                                        <span class="inline-block truncate max-w-xs" title="{{ $rub_doc->Valeur }}">
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
                            <div class="bg-blue-50 text-blue-800 p-4 rounded-xl flex items-start dark:bg-gray-800 dark:text-gray-300">
                                <i class="fas fa-info-circle mr-2 mt-1"></i> 
                                <span>Aucune rubrique associée à ce document.</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="px-6 py-4 flex justify-center space-x-4">
                <a href="{{ route('documents.index') }}" class="inline-flex items-center px-4 py-1 border border-blue-500 text-blue-600 rounded-xl hover:bg-blue-50 dark:hover:bg-gray-800">
                    <i class="fas fa-arrow-left mr-2"></i>Back to List
                </a>
                <a href="{{ route('documents.edit', $document->id) }}" class="inline-flex items-center px-4 py-1 border border-blue-300 text-blue-600 rounded-xl hover:bg-blue-50 dark:hover:bg-gray-800">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
            </div>
        </div>
    </div>

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

                        this.classList.remove('border-green-500', 'text-green-600', 'hover:bg-green-50');
                        this.classList.add('bg-green-500', 'text-white');
                        this.innerHTML = `<i class="fas fa-check mr-1"></i> File downloaded - Open it now`;
                    });
                });
            });
        </script>
    @endpush
@endsection