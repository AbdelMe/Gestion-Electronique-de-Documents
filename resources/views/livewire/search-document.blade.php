<div class="container mx-auto px-4 py-6">
    <div class="flex flex-col md:flex-row gap-4 mb-6">
        <div class="w-full md:w-1/2">
            <div class="relative flex items-center">
                <span class="absolute left-3 text-gray-500">
                    <i class="bi bi-search"></i>
                </span>
                <input wire:model.live.debounce.500ms="search_docs" type="text"
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:focus:border-brand-800 dark:border-gray-800 dark:bg-gray-900 dark:bg-white/[0.03] dark:text-white/90 dark:placeholder:text-white/30"
                    placeholder="Rechercher par titre, dossier ou type...">
            </div>
        </div>
        <div class="w-full md:w-1/4">
            <select wire:model.live="filter_by"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg
                       bg-white text-gray-900 placeholder-gray-400
                       focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
        
                       dark:border-gray-700 dark:bg-gray-800 dark:text-white dark:placeholder-gray-500
                       dark:focus:ring-blue-400 dark:focus:border-blue-400">
                <option value="" selected>Trier par</option>
                <option value="date_recent">Date la plus récente</option>
                <option value="date_ancien">Date la plus ancienne</option>
                <option value="name_asc">Nom (A → Z)</option>
                <option value="name_desc">Nom (Z → A)</option>

            </select>
        </div>

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @php
            $displayDocuments = strlen($search_docs) >= 2 || $filter_by ? $docs : $documents;
        @endphp
        @forelse($displayDocuments as $document)
        {{-- @if ($document->Dossier->entreprise->id == Auth::user()->entreprise_id && !Auth::user()->hasRole('admin')) --}}
            
        <div
            class="bg-white px-4 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 h-auto dark:border-gray-800 dark:bg-gray-800">
            <div
                class="px-3 py-1.5 flex justify-between items-center border-b dark:border-gray-700 dark:bg-gray-800">
                <div class="w-10 h-10 flex items-center justify-center">
                    @php
                        $extension = pathinfo($document->CheminDocument, PATHINFO_EXTENSION);
                        $icon = match ($extension) {
                            'pdf' => 'bi-file-earmark-pdf',
                            'doc', 'docx' => 'bi-file-earmark-word',
                            'xls', 'xlsx' => 'bi-file-earmark-excel',
                            'jpg', 'jpeg', 'png', 'gif' => 'bi-file-earmark-image',
                            default => 'bi-file-earmark',
                        };
                    @endphp
                    <img src="{{ asset('assets/images/icons/file (1).png') }}" width="30px" alt="Document Icon">
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('documents.show', $document->id) }}" class="text-blue-500 hover:text-blue-700"
                        title="Voir">
                        <i class="bi bi-eye-fill"></i>
                    </a>
                    <form action="{{ route('documents.destroy', $document->id) }}" method="POST"
                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce Document ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700" title="Supprimer">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="p-2">
                <h3 class="text-sm font-semibold text-gray-800 mb-1 dark:text-gray-300">{{ $document->titre }}</h3>

                <div class="flex flex-wrap gap-1 mb-2">
                    @if ($document->Dossier)
                        <span
                            class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            <i class="bi bi-folder mr-1"></i>
                            {{ $document->Dossier->Dossier }}
                        </span>
                    @endif
                    @if ($document->TypeDocument)
                        <span
                            class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-cyan-100 text-cyan-800">
                            <i class="bi bi-tag mr-1"></i>
                            {{ $document->TypeDocument->TypeDocument }}
                        </span>
                    @endif
                </div>

                <div class="flex items-center text-xs text-gray-500 mb-2 dark:text-gray-300">
                    <i class="bi bi-calendar mr-1"></i>
                    <span>{{ $document->Date }}</span>
                </div>
            </div>

            <div class="px-3 py-2 flex justify-center gap-2 border-t dark:border-gray-700 dark:bg-gray-800">
                <a href="{{ $document->CheminDocument ? asset('storage/' . $document->CheminDocument) : '#' }}"
                    class="inline-flex items-center px-2 py-1 border border-blue-500 rounded-xl text-xs font-medium text-blue-500 hover:bg-blue-50 dark:hover:bg-white/[0.05]">
                    <i class="bi bi-download mr-1"></i> Télécharger
                </a>
                <a href="{{ route('documents.show', $document->id) }}"
                    class="inline-flex items-center px-2 py-1 border border-gray-500 rounded-xl text-xs font-medium text-gray-500 hover:bg-gray-100 dark:hover:bg-white/[0.05]">
                    <i class="bi bi-eye mr-1"></i> Prévisualiser
                </a>
            </div>
        </div>
        {{-- @endif --}}
        @empty
            <div class="col-span-full py-8 text-center">
                <div
                    class="bg-blue-50 border border-blue-200 text-blue-700 px-4 py-3 rounded-xl dark:text-gray-300 dark:bg-gray-800">
                    Aucun document trouvé
                </div>
            </div>
        @endforelse
    </div>




    <!-- Pagination would go here -->
    {{-- <div class="mt-6">
        {{ $displayDocuments->links() }}
    </div> --}}
</div>
