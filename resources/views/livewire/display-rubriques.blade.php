<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-black dark:text-gray-300 mb-8">Créer un Document</h2>

    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <div class="max-w-xl">
            <label for="type_document_id" class="block text-black dark:text-gray-300 font-medium mb-2">Type
                Document</label>
            <select wire:model.live="selected_type" id="type_document_id" name="type_document_id"
                class="w-full border-2 border-gray-500 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('type_document_id') border-red-500 @enderror">
                <option value="">Sélectionnez un type de document</option>
                @foreach ($typeDocuments as $typeDocument)
                    <option value="{{ $typeDocument->id }}"
                        {{ old('type_document_id') == $typeDocument->id ? 'selected' : '' }}>
                        {{ $typeDocument->TypeDocument }}
                    </option>
                @endforeach
            </select>
            @error('type_document_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($rebrique as $rub)
                <div>
                    <label for="rubriques[{{ $rub->Rubrique }}]"
                        class="block text-black dark:text-gray-300 font-medium mb-2">{{ $rub->Rubrique }}</label>
                    @if ($rub->typeRubrique->TypeRubrique == 'textarea')
                        <textarea id="rubriques[{{ $rub->Rubrique }}]" name="rubriques[{{ $rub->id }}]" rows="4"
                            class="w-full border-2 border-gray-500 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error($rub->Rubrique) border-red-500 @enderror"></textarea>
                    @else
                        <input type="{{ $rub->typeRubrique->TypeRubrique }}" id="rubriques[{{ $rub->Rubrique }}]"
                            name="rubriques[{{ $rub->id }}]"
                            class="w-full border-2 border-gray-500 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error($rub->Rubrique) border-red-500 @enderror">
                    @endif
                    @error($rub->Rubrique)
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach
        </div>

        <hr class="my-8 border-t-2 border-gray-400 dark:border-gray-600">

        <div class="max-w-xl">
            <label for="entreprise_id" class="block text-black dark:text-gray-300 font-medium mb-2">Entreprise</label>
            <select wire:model.live="selected_entreprise" id="entreprise_id" name="entreprise_id"
                class="w-full border-2 border-gray-500 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('entreprise_id') border-red-500 @enderror">
                <option value="">Sélectionnez une Entreprise</option>
                @foreach ($entreprises as $entreprise)
                    <option value="{{ $entreprise->id }}" {{ old('。。') == $entreprise->id ? 'selected' : '' }}>
                        {{ $entreprise->NomClient }}
                    </option>
                @endforeach
            </select>
            @error('entreprise_id')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="titre" class="block text-black dark:text-gray-300 font-medium mb-2">Titre</label>
                <input type="text" id="titre" name="titre" value="{{ old('titre') }}"
                    class="w-full border-2 border-gray-500 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('titre') border-red-500 @enderror"
                    placeholder="Entrez le titre">
                @error('titre')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="metadata" class="block text-black dark:text-gray-300 font-medium mb-2">Metadata</label>
                <input type="text" id="metadata" name="metadata" value="{{ old('metadata') }}"
                    class="w-full border-2 border-gray-500 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('metadata') border-red-500 @enderror"
                    placeholder="Entrez les métadonnées">
                @error('metadata')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tag" class="block text-black dark:text-gray-300 font-medium mb-2">Tag</label>
                <input type="text" id="tag" name="tag" value="{{ old('tag') }}"
                    class="w-full border-2 border-gray-500 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('tag') border-red-500 @enderror"
                    placeholder="Entrez le tag">
                @error('tag')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div x-data="dragAndDropFile()" class="border-2 border-dashed border-gray-400 p-6 rounded-md text-center"
                x-on:dragover.prevent="dragover = true" x-on:dragleave.prevent="dragover = false"
                x-on:drop.prevent="handleDrop($event)">
                <label for="CheminDocument" class="block text-black dark:text-gray-300 font-medium mb-2">Chemin
                    Document</label>

                <template x-if="!file">
                    <p :class="{ 'text-blue-500': dragover }" class="text-gray-500">Drag & drop your file here or click
                        to select</p>
                </template>

                <input type="file" id="CheminDocument" name="CheminDocument" class="hidden" x-ref="fileInput"
                    @change="handleFileChange">

                <template x-if="file">
                    <p class="mt-2 text-sm text-green-600">File selected: <span x-text="file.name"></span></p>
                </template>

                <button type="button" @click="$refs.fileInput.click()"
                    class="inline-flex items-center px-4 mt-3 py-2  text-indigo-700 border hover:text-white border-indigo-600 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                    Browse
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


            @if (count($dossiers) > 0)
                <div>
                    <label for="dossier_id" class="block text-black dark:text-gray-300 font-medium mb-2">Dossier</label>
                    <select id="dossier_id" name="dossier_id"
                        class="w-full border-2 border-gray-500 rounded-md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('dossier_id') border-red-500 @enderror">
                        <option value="">Sélectionnez un Dossier</option>
                        @foreach ($dossiers as $dossier)
                            <option value="{{ $dossier->id }}"
                                {{ old('dossier_id') == $dossier->id ? 'selected' : '' }}>
                                {{ $dossier->Dossier }}
                            </option>
                        @endforeach
                    </select>
                    @error('dossier_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="etat_id" class="block text-black dark:text-gray-300 font-medium mb-2">Etat</label>
                    <select id="etat_id" name="etat_id"
                        class="w-full border-2 border-gray-500 rounded md px-4 py-2 bg-white dark:bg-gray-800 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-indigo-700 dark:focus:border-indigo-700 @error('etat_id') border-red-500 @enderror">
                        <option value="">Sélectionnez un Etat</option>
                        @foreach ($etats as $etat)
                            <option value="{{ $etat->id }}" {{ old('etat_id') == $etat->id ? 'selected' : '' }}>
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
                        @foreach ($classes as $classe)
                            <option value="{{ $classe->id }}"
                                {{ old('classe_id') == $classe->id ? 'selected' : '' }}>
                                {{ $classe->classe }}
                            </option>
                        @endforeach
                    </select>
                    @error('classe_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 max-w-md">
            <button type="submit"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Créer Document
            </button>
            <a href="{{ route('documents.index') }}"
                class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700 dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
                Annuler
            </a>
        </div>
    </form>
</div>
