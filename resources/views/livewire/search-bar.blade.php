<div class=" relative">
    <input type="text" placeholder="{{ __('header.search_placeholder') }}" id="search-input" wire:model.live="search_doc"
        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-200 bg-transparent py-2.5 pr-14 pl-12 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-500 focus:outline-none xl:w-[430px] dark:border-gray-800 dark:bg-gray-900 dark:focus:ring-indigo-500 dark:bg-white/[0.03] dark:text-white/90 dark:placeholder:text-white/30" />

    {{-- @if (!empty($docs))
        <div id="SearchResults"
            class="absolute z-50 mt-2 w-auto min-w-max bg-white dark:bg-gray-800 text-gray-800 dark:text-white rounded-lg shadow-lg max-h-96 overflow-y-auto scrollbar-none">
            <table class="w-full table-auto border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-800">
                        <th class="text-nowrap px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Type
                            Doc</th>
                        <th class="text-nowrap px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Dossier
                        </th>
                        <th class="text-nowrap px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">
                            Entreprise</th>
                        <th class="text-nowrap px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Created
                            at</th>
                        <th class="text-nowrap px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($docs as $doc)
                        <tr
                            class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="text-nowrap px-4 py-2 text-gray-800 dark:text-gray-200">
                                {{ $doc->typeDocument->TypeDocument ?? '' }}
                            </td>
                            <td class="text-nowrap px-4 py-2 text-gray-800 dark:text-gray-200">
                                <a href="{{ route('dossiers.show', $doc->dossier->id) }}"
                                    class="flex items-center gap-2 text-blue-600 dark:text-blue-400 hover:underline">
                                    <img src="{{ asset('assets/images/icons/folder.png') }}" width="24"
                                        alt="Folder">
                                    {{ $doc->dossier->Dossier ?? '' }}
                                </a>
                            </td>
                            <td class="text-nowrap px-4 py-2 text-gray-800 dark:text-gray-200">
                                {{ $doc->Dossier->Entreprise->NomClient ?? '' }}
                            </td>
                            <td class="text-nowrap px-4 py-2 text-gray-800 dark:text-gray-200">
                                {{ $doc->created_at?->format('M d, Y h:i A') ?? '' }}
                            </td>
                            </td>
                            <td class="text-nowrap px-4 py-2">
                                <a href="{{ route('documents.show', $doc->id) }}"
                                    class="inline-flex items-center px-5 py-1 text-xs font-medium text-gray-700 hover:text-gray-800 border border-indigo-800 rounded-full hover:bg-indigo-800/50 dark:text-gray-300 dark:bg-transparent dark:hover:bg-indigo-800/60">
                                    Voir
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif --}}
    @if (!empty($docs) && count($docs) > 0)
        <div id="SearchResults"
            class="absolute z-50 mt-2 w-auto min-w-max bg-white dark:bg-gray-800 text-gray-800 dark:text-white rounded-lg shadow-lg max-h-96 overflow-y-auto scrollbar-none">
            <table class="w-full table-auto border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-800">
                        <th class="text-nowrap px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Type
                            Doc</th>
                        <th class="text-nowrap px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Dossier
                        </th>
                        <th class="text-nowrap px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">
                            Entreprise</th>
                        <th class="text-nowrap px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Created
                            at</th>
                        <th class="text-nowrap px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($docs as $doc)
                        <tr
                            class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="text-nowrap px-4 py-2 text-gray-800 dark:text-gray-200">
                                {{ $doc->typeDocument->TypeDocument ?? '' }}
                            </td>
                            <td class="text-nowrap px-4 py-2 text-gray-800 dark:text-gray-200">
                                <a href="{{ route('dossiers.show', $doc->dossier->id) }}"
                                    class="flex items-center gap-2 text-blue-600 dark:text-blue-400 hover:underline">
                                    <img src="{{ asset('assets/images/icons/folder.png') }}" width="24"
                                        alt="Folder">
                                    {{ $doc->dossier->Dossier ?? '' }}
                                </a>
                            </td>
                            <td class="text-nowrap px-4 py-2 text-gray-800 dark:text-gray-200">
                                {{ $doc->Dossier->Entreprise->NomClient ?? '' }}
                            </td>
                            <td class="text-nowrap px-4 py-2 text-gray-800 dark:text-gray-200">
                                {{ $doc->created_at?->format('M d, Y h:i A') ?? '' }}
                            </td>
                            </td>
                            <td class="text-nowrap px-4 py-2">
                                <a href="{{ route('documents.show', $doc->id) }}"
                                    class="inline-flex items-center px-5 py-1 text-xs font-medium text-gray-700 hover:text-gray-800 border border-indigo-800 rounded-full hover:bg-indigo-800/50 dark:text-gray-300 dark:bg-transparent dark:hover:bg-indigo-800/60">
                                    {{-- <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12m0 0a3 3 0 1 0 6 0 3 3 0 1 0-6 0zm2 0h2m-2 0h-2m-6 0a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                                        </svg> --}}
                                    Voir
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @elseif(strlen($search_doc) > 0)
        <div id="SearchResults"
            class="absolute z-50 mt-2 w-auto min-w-max bg-white dark:bg-gray-800 text-gray-800 dark:text-white rounded-lg shadow-lg p-12 py-2">
            <p class="text-sm text-center text-gray-600 dark:text-gray-300">No documents found.</p>
        </div>
    @endif

    <style>
        #SearchResults::-webkit-scrollbar {
            display: none;
        }

        .table-hover tbody tr:hover {
            background-color: #2d3748 !important;
        }

        #SearchResults::-webkit-scrollbar {
            display: none;
        }
    </style>

    @push('scripts')
        <script>
            const searchResults = document.getElementById('SearchResults');
            searchResults.addEventListener('mouseleave', () => {
                searchResults.style.display = 'none';
            });
        </script>
    @endpush
</div>
