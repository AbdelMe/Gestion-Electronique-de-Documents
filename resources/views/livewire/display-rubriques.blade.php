<div class="container mt-4">
    <h2 class="mb-4">Créer Document</h2>

    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="type_document_id">Type Document</label>
                    <select wire:model.live="selected_type"
                        class="form-control @error('type_document_id') is-invalid @enderror text-white"
                        id="type_document_id" name="type_document_id" style="overflow-y: hidden;">
                        <option value="">Sélectionnez un type de document</option>
                        @foreach ($typeDocuments as $typeDocument)
                            <option value="{{ $typeDocument->id }}"
                                {{ old('type_document_id') == $typeDocument->id ? 'selected' : '' }}>
                                {{ $typeDocument->TypeDocument }}
                            </option>
                        @endforeach
                    </select>
                    @error('type_document_id')
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
                        @if ($rub->typeRubrique->Hauteur !== null && $rub->typeRubrique->Largeur !== null)
                            <input type="{{ $rub->typeRubrique->TypeRubrique }}"
                                class="form-control @error($rub->Rubrique) is-invalid @enderror text-white"
                                id="rubriques[{{ $rub->Rubrique }}]" name="rubriques[{{ $rub->id }}]"
                                {{ $rub->Obligatoire ? 'required' : '' }}
                                style="width: {{ $rub->typeRubrique->Largeur }}px; height: {{ $rub->typeRubrique->Hauteur }}px;">
                        @else
                            @if ($rub->typeRubrique->TailleRubrique == null)
                                <textarea class="form-control @error($rub->Rubrique) is-invalid @enderror text-white"
                                    id="rubriques[{{ $rub->Rubrique }}]" name="rubriques[{{ $rub->id }}]" rows="5"
                                    {{ $rub->Obligatoire ? 'required' : '' }}></textarea>
                            @else
                                <input type="{{ $rub->typeRubrique->TypeRubrique }}"
                                    class="form-control @error($rub->Rubrique) is-invalid @enderror text-white"
                                    id="rubriques[{{ $rub->Rubrique }}]" name="rubriques[{{ $rub->id }}]"
                                    {{ $rub->Obligatoire ? 'required' : '' }}>
                            @endif
                        @endif
                        @error($rub->Rubrique)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach
        </div>

        <hr class="my-4 border-4 border-white border-dark opacity-75">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="entreprise_id">Entreprise</label>
                    <select class="form-control @error('entreprise_id') is-invalid @enderror text-white"
                        id="entreprise_id" name="entreprise_id" wire:model.live="selected_entreprise">
                        <option value="">Sélectionnez une Entreprise</option>
                        @foreach ($entreprises as $entreprise)
                            <option value="{{ $entreprise->id }}"
                                {{ old('entreprise_id') == $entreprise->id ? 'selected' : '' }}>
                                {{ $entreprise->NomClient }}
                            </option>
                        @endforeach
                    </select>
                    @error('entreprise_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            {{-- @if (count($services) > 0)
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="service_id">Services</label>
                        <select class="form-control @error('service_id') is-invalid @enderror text-white"
                            id="service_id" name="service_id" wire:model.live="selected_service">
                            <option value="">Sélectionnez un service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}"
                                    {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                    {{ $service->Service }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endif --}}
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control @error('titre') is-invalid @enderror text-white"
                            id="titre" name="titre" value="{{ old('titre') }}">
                        @error('titre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="metadata">Metadata</label>
                        <input type="text" class="form-control @error('metadata') is-invalid @enderror text-white"
                            id="metadata" name="metadata" value="{{ old('metadata') }}">
                        @error('metadata')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="tag">Tag</label>
                        <input type="text" class="form-control @error('tag') is-invalid @enderror text-white"
                            id="tag" name="tag" value="{{ old('tag') }}">
                        @error('tag')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="CheminDocument">CheminDocument</label>
                        <input type="file" class="form-control @error('CheminDocument') is-invalid @enderror text-white"
                            id="CheminDocument" name="CheminDocument" value="{{ old('CheminDocument') }}">
                        @error('CheminDocument')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @if (count($dossiers) > 0)
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="dossier_id">Dossier</label>
                        <select class="form-control @error('dossier_id') is-invalid @enderror text-white"
                            id="dossier_id" name="dossier_id">
                            <option value="">Sélectionnez un Dossier</option>
                            @foreach ($dossiers as $dossier)
                                <option value="{{ $dossier->id }}"
                                    {{ old('dossier_id') == $dossier->id ? 'selected' : '' }}>
                                    {{ $dossier->Dossier }}
                                </option>
                            @endforeach
                        </select>
                        @error('dossier_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="etat_id">Etat</label>
                        <select class="form-control @error('etat_id') is-invalid @enderror text-white" id="etat_id"
                            name="etat_id">
                            <option value="">Sélectionnez une Etat</option>
                            @foreach ($etats as $etat)
                                <option value="{{ $etat->id }}"
                                    {{ old('etat_id') == $etat->id ? 'selected' : '' }}>
                                    {{ $etat->etat }}
                                </option>
                            @endforeach
                        </select>
                        @error('etat_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="classe_id">Classe</label>
                        <select class="form-control @error('classe_id') is-invalid @enderror text-white"
                            id="classe_id" name="classe_id">
                            <option value="">Sélectionnez un Classe</option>
                            @foreach ($classes as $classe)
                                <option value="{{ $classe->id }}"
                                    {{ old('classe_id') == $classe->id ? 'selected' : '' }}>
                                    {{ $classe->classe }}
                                </option>
                            @endforeach
                        </select>
                        @error('classe_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="col-md-6">
                    <button class="btn btn-primary">Ajouter version</button>
                </div> --}}

            @endif
        </div>



        {{-- <div class="row">


            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="Supprimer">Supprimer</label>
                    <select class="form-control @error('Supprimer') is-invalid @enderror text-white" id="Supprimer"
                        name="Supprimer">
                        <option value="0" {{ old('Supprimer') == 0 ? 'selected' : '' }}>No</option>
                        <option value="1" {{ old('Supprimer') == 1 ? 'selected' : '' }}>Yes</option>
                    </select>
                    @error('Supprimer')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="EnCoursSuppression">En Cours Suppression</label>
                    <select class="form-control @error('EnCoursSuppression') is-invalid @enderror text-white"
                        id="EnCoursSuppression" name="EnCoursSuppression">
                        <option value="0" {{ old('EnCoursSuppression') == 0 ? 'selected' : '' }}>No</option>
                        <option value="1" {{ old('EnCoursSuppression') == 1 ? 'selected' : '' }}>Yes</option>
                    </select>
                    @error('EnCoursSuppression')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div> --}}


        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Créer Document</button>
            <a href="{{ route('documents.index') }}" class="btn btn-primary">Annuler</a>
        </div>
    </form>
</div>
