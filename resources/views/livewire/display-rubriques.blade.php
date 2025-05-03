<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-gray-700 mb-8">Créer Document</h2>

    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <div class="max-w-xl">
            <label for="type_document_id" class="block text-gray-700 font-medium mb-2">Type Document</label>
            <select wire:model.live="selected_type"
                id="type_document_id" name="type_document_id" required
                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Sélectionnez un type de document</option>
                @foreach ($typeDocuments as $typeDocument)
                    <option value="{{ $typeDocument->id }}" {{ old('type_document_id') == $typeDocument->id ? 'selected' : '' }}>
                        {{ $typeDocument->TypeDocument }}
                    </option>
                @endforeach
            </select>
            @error('type_document_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($rebrique as $rub)
                <div>
                    <label for="rubriques[{{ $rub->Rubrique }}]" class="block text-gray-700 font-medium mb-2">{{ $rub->Rubrique }}</label>
                    @if ($rub->typeRubrique->TypeRubrique == 'textarea')
                        <textarea id="rubriques[{{ $rub->Rubrique }}]" name="rubriques[{{ $rub->id }}]" rows="4"
                            class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    @else
                        <input type="{{ $rub->typeRubrique->TypeRubrique }}" 
                            id="rubriques[{{ $rub->Rubrique }}]" name="rubriques[{{ $rub->id }}]"
                            class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @endif
                    @error($rub->Rubrique)
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach
        </div>

        <hr class="my-8 border-t-2 border-gray-300">

        <div class="max-w-xl">
            <label for="entreprise_id" class="block text-gray-700 font-medium mb-2">Entreprise</label>
            <select wire:model.live="selected_entreprise"
                id="entreprise_id" name="entreprise_id"
                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Sélectionnez une Entreprise</option>
                @foreach ($entreprises as $entreprise)
                    <option value="{{ $entreprise->id }}" {{ old('entreprise_id') == $entreprise->id ? 'selected' : '' }}>
                        {{ $entreprise->NomClient }}
                    </option>
                @endforeach
            </select>
            @error('entreprise_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="titre" class="block text-gray-700 font-medium mb-2">Titre</label>
                <input type="text" id="titre" name="titre" value="{{ old('titre') }}"
                    class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('titre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="metadata" class="block text-gray-700 font-medium mb-2">Metadata</label>
                <input type="text" id="metadata" name="metadata" value="{{ old('metadata') }}"
                    class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('metadata')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tag" class="block text-gray-700 font-medium mb-2">Tag</label>
                <input type="text" id="tag" name="tag" value="{{ old('tag') }}"
                    class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('tag')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="CheminDocument" class="block text-gray-700 font-medium mb-2">Chemin Document</label>
                <input type="file" id="CheminDocument" name="CheminDocument"
                    class="w-full border-2 border-gray-300 rounded-md px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('CheminDocument')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            @if (count($dossiers) > 0)
                <div>
                    <label for="dossier_id" class="block text-gray-700 font-medium mb-2">Dossier</label>
                    <select id="dossier_id" name="dossier_id"
                        class="w-full border-2 border-gray-300 rounded-md px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Sélectionnez un Dossier</option>
                        @foreach ($dossiers as $dossier)
                            <option value="{{ $dossier->id }}" {{ old('dossier_id') == $dossier->id ? 'selected' : '' }}>
                                {{ $dossier->Dossier }}
                            </option>
                        @endforeach
                    </select>
                    @error('dossier_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="etat_id" class="block text-gray-700 font-medium mb-2">Etat</label>
                    <select id="etat_id" name="etat_id"
                        class="w-full border-2 border-gray-300 rounded-md px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Sélectionnez un Etat</option>
                        @foreach ($etats as $etat)
                            <option value="{{ $etat->id }}" {{ old('etat_id') == $etat->id ? 'selected' : '' }}>
                                {{ $etat->etat }}
                            </option>
                        @endforeach
                    </select>
                    @error('etat_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="classe_id" class="block text-gray-700 font-medium mb-2">Classe</label>
                    <select id="classe_id" name="classe_id"
                        class="w-full border-2 border-gray-300 rounded-md px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Sélectionnez un Classe</option>
                        @foreach ($classes as $classe)
                            <option value="{{ $classe->id }}" {{ old('classe_id') == $classe->id ? 'selected' : '' }}>
                                {{ $classe->classe }}
                            </option>
                        @endforeach
                    </select>
                    @error('classe_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            @endif
        </div>

        <div class="flex items-center justify-center gap-4 mt-10">
            <button type="submit"
                class="inline-flex items-center justify-center px-8 py-3 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md transition">
                Créer Document
            </button>
            <a href="{{ route('documents.index') }}"
                class="inline-flex items-center justify-center px-8 py-3 bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium rounded-md transition">
                Annuler
            </a>
        </div>

    </form>
</div>
