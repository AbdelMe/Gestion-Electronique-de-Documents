<div x-data="{ showModal: false, selectedDocumentId: null, selectedEtatId: null, rejectionReason: '' }" class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">État des Documents</h2>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input type="text" wire:model.live="search_doc" placeholder="Rechercher..."
                    class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Document</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Dossier</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Client</th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            État</th>
                        <th
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($documents as $document)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div
                                        class="flex-shrink-0 h-10 w-10 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                                        <svg class="h-6 w-6 text-blue-600 dark:text-blue-300" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                            {{ $document->titre }}</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            {{ $document->created_at->format('d/m/Y') }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                {{ $document->dossier->Dossier ?? 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                {{ $document->dossier->entreprise->NomClient ?? 'N/A' }}</td>
<td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center space-x-3">
            <select x-ref="etatSelect{{ $document->id }}"
                class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md transition-colors duration-200">
                @foreach ($etats as $etat)
                    <option value="{{ $etat->id }}"
                        {{ $document->etat_id == $etat->id ? 'selected' : '' }}
                        class="text-gray-900 dark:text-gray-100">
                        {{ $etat->etat }}
                    </option>
                @endforeach
            </select>

            <button type="button"
                @click="
                    selectedDocumentId = {{ $document->id }};
                    selectedEtatId = $refs.etatSelect{{ $document->id }}.value;
                    // Check if the selected state is 'Rejected' (you might need to adjust this based on your actual state values)
                    if (selectedEtatId == {{ $rejectedEtatId ?? 3 }}) { // Assuming 3 is the ID for 'Rejected'
                        showModal = true;
                        rejectionReason = '';
                    } else {
                        // Submit the form directly for other states
                        $dispatch('submit-etat', {
                            documentId: selectedDocumentId,
                            etatId: selectedEtatId,
                            rejectionReason: ''
                        });
                    }
                "
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                <svg class="-ml-0.5 mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Valider
            </button>
        </div>
    </td>

    <!-- Add this script to handle the form submission -->
    <script>
        document.addEventListener('submit-etat', (event) => {
            const { documentId, etatId, rejectionReason } = event.detail;
            
            fetch(`/document/${documentId}/update-etat`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    document_id: documentId,
                    etat_id: etatId,
                    rejection_reason: rejectionReason
                })
            }).then(response => {
                if (response.ok) {
                    window.location.reload();
                }
            });
        });
    </script>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('documents.edit', $document->id) }}"
                                        class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition-colors duration-200"
                                        title="Modifier">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('documents.show', $document->id) }}"
                                        class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300 transition-colors duration-200"
                                        title="Afficher">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>

                                    <form action="{{ route('documents.destroy', $document->id) }}" method="POST"
                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce document ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition-colors duration-200"
                                            title="Supprimer" aria-label="Supprimer le document">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 text-center text-sm text-gray-500 dark:text-gray-400">
                                <div class="flex flex-col items-center justify-center py-8">
                                    <p class="mt-2 text-lg font-medium text-gray-600 dark:text-gray-300">Aucun document
                                        trouvé</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Commencez par ajouter un
                                        nouveau
                                        document</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if ($documents->hasPages())
        <div class="mt-4">{{ $documents->links() }}</div>
    @endif

    <!-- Modal -->
    <div x-show="showModal" x-transition x-cloak
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 max-w-md w-full mx-2 shadow-lg"
            @click.away="showModal = false">

            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">
                Motif du refus (si nécessaire)
            </h2>

            <form :action="`/document/${selectedDocumentId}/update-etat`" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <input type="hidden" name="etat_id" :value="selectedEtatId">
                <input type="hidden" name="document_id" :value="selectedDocumentId">

                <div>
                    <label for="rejection_reason"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Motif du rejet</label>
                    <textarea name="rejection_reason" x-model="rejectionReason" id="rejection_reason" rows="3"
                        class="mt-1 block w-full px-4 py-2 text-sm font-medium text-indigo-700 dark:text-white border border-indigo-600 dark:border-indigo-400 bg-white dark:bg-transparent rounded-xl shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 resize-none"></textarea>
                </div>

                <div class="mt-4 text-right">
                    <button type="button" @click="showModal = false"
                        class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700  dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                        Annuler
                    </button>
                    <button type="submit"
                        class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700  dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                        Confirmer
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
