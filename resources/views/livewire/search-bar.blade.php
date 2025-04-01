<div>
    <div class="mt-3 position-relative">
        <input type="text" class="form-control mb-3 text-light" placeholder="Search by document title or folder name..."
            wire:model.live='search_doc'
            style="width: 400px; border: none; background: linear-gradient(90deg, #496683 0%, #1e2f3f 100%);">

        @if (!empty($docs))
            <div id="SearchResults" class="position-absolute shadow rounded"
                style="max-height: 500px; overflow-y: auto; overflow-x: hidden; scrollbar-width: none; -ms-overflow-style: none; width: fit-content; background-color: #232936ea; z-index: 1000;">
                <table class="table table-hover table-bordered mb-0" style="width: auto;">
                    <thead>
                        <tr style="background-color: #161b25ea;">
                            <th class="text-nowrap text-light">Type Doc</th>
                            <th class="text-nowrap text-light">Dossier</th>
                            <th class="text-nowrap text-light">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($docs as $doc)
                            <tr style="color: white;">
                                <td class="text-nowrap px-5">{{ $doc->typeDocument->TypeDocument ?? '' }}</td>
                                <td class="text-nowrap px-5"><a href={{ route('dossiers.show', $doc->dossier->id) }}>
                                        <img src="{{ asset('assets/images/icons/folder.png') }}"
                                            width="24px">{{ $doc->dossier->Dossier ?? '' }}</a></td>
                                <td class="text-nowrap px-5">
                                    <a href={{ route('documents.show', $doc->id) }}
                                        class="btn btn-sm btn-outline-success rounded-pill">
                                        <i class="bi bi-eye"></i> Voir
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

    </div>

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
            searchResults = document.getElementById('SearchResults');
            searchResults.addEventListener('mouseleave', () => {
                searchResults.style.display = 'none'
            })
        </script>
    @endpush
</div>
