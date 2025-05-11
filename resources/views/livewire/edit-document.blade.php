<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-black dark:text-gray-300 mb-8">Modifier un Document</h2>

    <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="type_document_id" class="block text-black dark:text-gray-300 font-medium mb-2">Type
                    Document</label>
                <select wire:model.live="selected_type_doc" id="type_document_id" name="type_document_id"
                    class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('type_document_id') border-red-500 @enderror">
                    <option value="">Sélectionnez un type de document</option>
                    @foreach ($typeDocuments as $typeDocument)
                        <option value="{{ $typeDocument->id }}"
                            {{ old('type_document_id', $document->TypeDocument) == $typeDocument->id ? 'selected' : '' }}>
                            {{ $typeDocument->TypeDocument }}
                        </option>
                    @endforeach
                </select>
                @error('type_document_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="dossier_id" class="block text-black dark:text-gray-300 font-medium mb-2">Dossier</label>
                <select id="dossier_id" name="dossier_id"
                    class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('dossier_id') border-red-500 @enderror">
                    <option value="">Sélectionnez un dossier</option>
                    @foreach ($dossiers as $dossier)
                        <option value="{{ $dossier->id }}"
                            {{ old('dossier_id', $document->dossier_id) == $dossier->id ? 'selected' : '' }}>
                            {{ $dossier->Dossier }}
                        </option>
                    @endforeach
                </select>
                @error('dossier_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($rebrique as $rub)
                <div>
                    <label for="rubriques[{{ $rub->Rubrique }}]"
                        class="block text-black dark:text-gray-300 font-medium mb-2">{{ $rub->Rubrique }}</label>
                    @if ($rub->typeRubrique->TypeRubrique == 'textarea')
                        <textarea id="rubriques[{{ $rub->Rubrique }}]" name="rubriques[{{ $rub->id }}]" rows="5"
                            class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error($rub->Rubrique) border-red-500 @enderror"></textarea>
                    @else
                        <input type="{{ $rub->typeRubrique->TypeRubrique }}" id="rubriques[{{ $rub->Rubrique }}]"
                            name="rubriques[{{ $rub->id }}]"
                            class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error($rub->Rubrique) border-red-500 @enderror">
                    @endif
                    @error($rub->Rubrique)
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="titre" class="block text-black dark:text-gray-300 font-medium mb-2">Titre</label>
                <input type="text" id="titre" name="titre" value="{{ old('titre', $document->titre) }}"
                    class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('titre') border-red-500 @enderror"
                    placeholder="Entrez le titre">
                @error('titre')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="metadata" class="block text-black dark:text-gray-300 font-medium mb-2">Metadata</label>
                <input type="text" id="metadata" name="metadata" value="{{ old('metadata', $document->metadata) }}"
                    class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('metadata') border-red-500 @enderror"
                    placeholder="Entrez les métadonnées">
                @error('metadata')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tag" class="block text-black dark:text-gray-300 font-medium mb-2">Tag</label>
                <input type="text" id="tag" name="tag" value="{{ old('tag', $document->tag) }}"
                    class="w-full border-2 border-gray-700 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('tag') border-red-500 @enderror"
                    placeholder="Entrez le tag">
                @error('tag')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div x-data="dragAndDropFile()"
                    class="w-full border-2 border-dashed border-gray-700 rounded-md px-4 py-6 text-center"
                    x-on:dragover.prevent="dragover = true" x-on:dragleave.prevent="dragover = false"
                    x-on:drop.prevent="handleDrop($event)">

                    <label for="CheminDocument" class="block text-black dark:text-gray-300 font-medium mb-2">
                        Document Numérique
                    </label>

                    <template x-if="!file">
                        <p :class="{ 'text-blue-500': dragover }" class="text-gray-500">Faites glisser un fichier ici ou
                            cliquez pour en choisir un</p>
                    </template>

                    <input type="file" id="CheminDocument" name="CheminDocument" class="hidden " x-ref="fileInput"
                        @change="handleFileChange">

                    <template x-if="file">
                        <p class="mt-2 text-sm text-green-600">Fichier sélectionné : <span x-text="file.name"></span>
                        </p>
                    </template>

                    <button type="button" @click="$refs.fileInput.click()"
                        class="inline-flex items-center px-4 mt-3 py-2  text-indigo-700 border hover:text-white border-indigo-600 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                        Choisir un fichier
                    </button>

                    @error('CheminDocument')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <script>
                    function dragAndDropFile() {
                        return {
                            file: null,
                            dragover: false,
                            handleFileChange(event) {
                                this.file = event.target.files[0];
                            },
                            handleDrop(event) {
                                this.dragover = false;
                                const files = event.dataTransfer.files;
                                if (files.length) {
                                    this.$refs.fileInput.files = files;
                                    this.handleFileChange({
                                        target: {
                                            files
                                        }
                                    });
                                }
                            }
                        }
                    }
                </script>

                @if ($document->CheminDocument)
                    @php
                        $extension = strtolower(pathinfo($document->CheminDocument, PATHINFO_EXTENSION));
                        $fileUrl = asset('storage/' . $document->CheminDocument);
                    @endphp
                    <div class="mt-4 flex flex-wrap gap-2">
                        @if ($extension === 'pdf')
                            <a href="{{ $fileUrl }}" target="_blank"
                                class="inline-flex items-center px-3 py-1.5 border border-blue-500 text-blue-600 rounded-xl bg-blue-50 hover:bg-blue-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-400 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                                </svg>
                                Voir PDF
                            </a>
                            @php
                                App\Models\Log::create([
                                    'document_id' => $document->id,
                                    'user_id' => Auth::user()->id,
                                    'date' => now(),
                                    'action' => 'view Document',
                                ]);
                            @endphp
                            
                        @elseif (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                            <a href="{{ $fileUrl }}" target="_self"
                                class="inline-flex items-center px-3 py-1.5 border border-blue-500 text-blue-600 rounded-xl bg-blue-50 hover:bg-blue-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-400 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11l-3 4L9 13l-4 5h14l-4-6z" />
                                </svg>
                                Voir Image
                            </a>
                            @php
                                App\Models\Log::create([
                                    'document_id' => $document->id,
                                    'user_id' => Auth::user()->id,
                                    'date' => now(),
                                    'action' => 'view Document',
                                ]);
                            @endphp
                        @elseif (in_array($extension, ['xlsx', 'xls']))
                            <a href="ms-excel:ofe|u|{{ $fileUrl }}"
                                class="inline-flex items-center px-3 py-1.5 border border-blue-500 text-blue-600 rounded-xl bg-blue-50 hover:bg-blue-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-400 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                                </svg>
                                Ouvrir dans Excel
                            </a>
                            @php
                                App\Models\Log::create([
                                    'document_id' => $document->id,
                                    'user_id' => Auth::user()->id,
                                    'date' => now(),
                                    'action' => 'view Document',
                                ]);
                            @endphp
                        @elseif (in_array($extension, ['docx', 'doc']))
                            <a href="ms-word:ofe|u|{{ $fileUrl }}"
                                class="inline-flex items-center px-3 py-1.5 border border-blue-500 text-blue-600 rounded-xl bg-blue-50 hover:bg-blue-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-400 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                                </svg>
                                Ouvrir dans Word
                            </a>
                            @php
                                App\Models\Log::create([
                                    'document_id' => $document->id,
                                    'user_id' => Auth::user()->id,
                                    'date' => now(),
                                    'action' => 'view Document',
                                ]);
                            @endphp
                        @elseif (in_array($extension, ['pptx', 'ppt']))
                            <a href="ms-powerpoint:ofe|u|{{ $fileUrl }}"
                                class="inline-flex items-center px-3 py-1.5 border border-blue-500 text-blue-600 rounded-xl bg-blue-50 hover:bg-blue-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-400 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                                </svg>
                                Ouvrir dans PowerPoint
                            </a>
                            @php
                                App\Models\Log::create([
                                    'document_id' => $document->id,
                                    'user_id' => Auth::user()->id,
                                    'date' => now(),
                                    'action' => 'view Document',
                                ]);
                            @endphp
                        @endif

                        <a href="{{ route('documents.download', $document->id) }}"
                            class="inline-flex items-center px-3 py-1.5 border border-gray-500 text-gray-700 rounded-xl bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-300 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3" />
                            </svg>
                            Télécharger
                        </a>

                        <a href="{{ $fileUrl }}"
                            onclick="event.preventDefault(); printPDF('{{ $fileUrl }}');"
                            class="inline-flex items-center px-3 py-1.5 border border-green-500 text-green-700 rounded-xl bg-green-50 hover:bg-green-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-green-400 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 9V2h12v7m-6 7h6a2 2 0 002-2v-3a2 2 0 00-2-2H6a2 2 0 00-2 2v3a2 2 0 002 2h6zm0 0v4m0 0H8m4 0h4" />
                            </svg>
                            Imprimer
                        </a>
                    </div>
                @else
                    <div class="mt-2">
                        <small class="text-gray-600 dark:text-gray-400">Aucun fichier téléchargé.</small>
                    </div>
                @endif
                @error('CheminDocument')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="etat_id" class="block text-black dark:text-gray-300 font-medium mb-2">Etat</label>
                <select id="etat_id" name="etat_id"
                    class="w-full border-2 border-gray-500 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('etat_id') border-red-500 @enderror">
                    <option value="">Sélectionnez un Etat</option>
                    @foreach ($etats as $etat)
                        <option value="{{ $etat->id }}"
                            {{ old('etat_id', $document->etat_id) == $etat->id ? 'selected' : '' }}>
                            {{ $etat->etat }}
                        </option>
                    @endforeach
                </select>

                @error('etat_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="classe_id" class="block text-black dark:text-gray-300 font-medium mb-2">Classe</label>
                <select id="classe_id" name="classe_id"
                    class="w-full border-2 border-gray-500 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('classe_id') border-red-500 @enderror">
                    <option value="">Sélectionnez une Classe</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}"
                            {{ old('classe_id', $document->classe_id) == $class->id ? 'selected' : '' }}>
                            {{ $class->classe }}
                        </option>
                    @endforeach
                </select>
                @error('classe_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex items-center gap-4 max-w-md">
            <button type="submit"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Mettre à jour
            </button>
            <a href="{{ route('documents.index') }}"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Annuler
            </a>
        </div>
    </form>
    <script>
        function printPDF(url) {
            const iframe = document.createElement('iframe');
            iframe.style.display = 'none';
            iframe.src = url;
            document.body.appendChild(iframe);
            iframe.contentWindow.focus();
            iframe.contentWindow.print();
            setTimeout(() => {
                document.body.removeChild(iframe);
            }, 1000);
        }
    </script>
</div>
