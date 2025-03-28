<div>
    <div class="mt-3">
        <input type="text" class="form-control mb-3 text-light" placeholder="Search document"
            wire:model.live='search_doc' style="width: 400px">
        <div id="SearchResults" class="position-absolute shadow rounded"
            style="max-height: 500px; overflow-y: auto; overflow-x: hidden; scrollbar-width: none; -ms-overflow-style: none; width: fit-content;background-color: #232936ea">
            <table class="table table-hover table-bordered mb-0" style="width: auto;">
                @php
                    if (!empty($docs)) {
                        '<thead >
                            <tr style="background-color: #161b25ea">
                                <th class="text-nowrap text-light">Type Doc</th>
                                <th class="text-nowrap text-light">Dossier</th>
                                <th class="text-nowrap text-light">Service</th>
                                <th class="text-nowrap text-light">Action</th>
                            </tr>
                        </thead>';
                } @endphp
                <tbody>
                    @foreach ($docs as $doc)
                        <tr style="color: white">
                            <td class="text-nowrap">{{ $doc->typeDocument->TypeDocument }}</td>
                            <td class="text-nowrap">{{ $doc->dossier->Dossier }}</td>
                            <td class="text-nowrap">{{ $doc->dossier->Service->Service }}</td>
                            <td class="text-nowrap">
                                <a href="{{ asset('storage/' . $doc->DocumentNumerique) }}" target="_blank"
                                    class="btn btn-sm btn-success rounded-pill">
                                    <i class="bi bi-eye"></i> Voir
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <style>
                #SearchResults::-webkit-scrollbar {
                    display: none;
                }
            </style>
            <script>
                let SearchResault = document.getElementById('SearchResults');
                SearchResault.onmouseleave = () => {
                    SearchResault.style.display = 'none';
                }
            </script>
        </div>
    </div>
</div>
