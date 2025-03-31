<div class="container mt-4">
    <h2 class="mb-4">Modifier Document</h2>

    <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="type_document_id">Type Document</label>
                    <select class="form-control @error('type_document_id') is-invalid @enderror text-white"
                        id="type_document_id" name="type_document_id" wire:model.live="selected_type_doc">
                        <option value="">Sélectionnez un type de document</option>
                        @foreach ($typeDocuments as $typeDocument)
                            <option value="{{ $typeDocument->id }}"
                                {{ old('type_document_id', $document->type_document_id) == $typeDocument->id ? 'selected' : '' }}>
                                {{ $typeDocument->TypeDocument }}
                            </option>
                        @endforeach
                    </select>
                    @error('type_document_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="dossier_id">Dossier</label>
                    <select class="form-control @error('dossier_id') is-invalid @enderror text-white" id="dossier_id"
                        name="dossier_id">
                        <option value="">Sélectionnez un dossier</option>
                        @foreach ($dossiers as $dossier)
                            <option value="{{ $dossier->id }}"
                                {{ old('dossier_id', $document->dossier_id) == $dossier->id ? 'selected' : '' }}>
                                {{ $dossier->Dossier }}
                            </option>
                        @endforeach
                    </select>
                    @error('dossier_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($rebrique as $rub)
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="{{ $rub->Rubrique }}">{{ $rub->Rubrique }}</label>
                        @if ($rub->typeRubrique->TypeRubrique == 'textarea')
                            <textarea class="form-control @error($rub->Rubrique) is-invalid @enderror text-white"
                                id="rubriques[{{ $rub->Rubrique }}]" name="rubriques[{{ $rub->id }}]" rows="5"></textarea>
                        @else
                            <input type="{{ $rub->typeRubrique->TypeRubrique }}"
                                class="form-control @error($rub->Rubrique) is-invalid @enderror text-white"
                                id="rubriques[{{ $rub->Rubrique }}]" name="rubriques[{{ $rub->id }}]">

                            {{-- style="width: {{ $rub->typeRubrique->Largeur }}px; height: {{ $rub->typeRubrique->Hauteur }}px;" --}}
                            {{-- 
                            @if ($rub->typeRubrique->TailleRubrique == null)

                            @else
                                <input type="{{ $rub->typeRubrique->TypeRubrique }}"
                                    class="form-control @error($rub->Rubrique) is-invalid @enderror text-white"
                                    id="rubriques[{{ $rub->Rubrique }}]" name="rubriques[{{ $rub->id }}]"
                                    >
                            @endif --}}
                        @endif
                        @error($rub->Rubrique)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="titre">Titre</label>
                <input type="text" class="form-control @error('titre') is-invalid @enderror text-white"
                    id="titre" name="titre" value={{ $document->titre }}>
                @error('titre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="metadata">Metadata</label>
                    <input type="text" class="form-control @error('metadata') is-invalid @enderror text-white"
                        id="metadata" name="metadata" value={{ $document->metadata }}>
                    @error('metadata')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="tag">Tag</label>
                    <input type="text" class="form-control @error('tag') is-invalid @enderror text-white"
                        id="tag" name="tag" value={{ $document->tag }}>
                    @error('tag')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="CheminDocument">Document Numérique</label>
                    @if ($document->CheminDocument)
                        <div class="mt-2">
                            <small class="text-muted">Current file: <a
                                    href="{{ asset('storage/' . $document->CheminDocument) }}" target="_blank">View
                                    Document</a></small>
                        </div>
                    @else
                        <div class="mt-2">
                            <small class="text-muted">No file uploaded. <label for="uploadFile">upload
                                    Document</label><input id="uploadFile" type="file" hidden></small>
                        </div>
                    @endif
                    @error('CheminDocument')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>


        </div>



        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Mettre à jour</button>
            <a href="{{ route('documents.index') }}" class="btn btn-primary">Annuler</a>
        </div>
    </form>
</div>
