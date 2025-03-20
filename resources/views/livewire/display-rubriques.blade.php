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
                        id="type_document_id" name="type_document_id" required style="overflow-y: hidden;">
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

            @isset($dossiers)
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="dossier_id">Dossier</label>
                        <select class="form-control @error('dossier_id') is-invalid @enderror text-white" id="dossier_id"
                            name="dossier_id" required>
                            <option value="">Sélectionnez un dossier</option>
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
            @endisset
        </div>

        <div class="row">
            @foreach ($rebrique as $rub)
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="{{ $rub->Rubrique }}">{{ $rub->Rubrique }}</label>
                        @if ($rub->typeRubrique->Hauteur !== null && $rub->typeRubrique->Largeur !== null)
                            <input type="{{ $rub->typeRubrique->TypeRubrique }}" 
                                   class="form-control @error($rub->Rubrique) is-invalid @enderror text-white" 
                                   id="{{ $rub->Rubrique }}" 
                                   name="{{ $rub->Rubrique }}" 
                                   style="width: {{ $rub->typeRubrique->Largeur }}px; height: {{ $rub->typeRubrique->Hauteur }}px;">
                        @else
                            <input type="{{ $rub->typeRubrique->TypeRubrique }}" 
                                   class="form-control @error($rub->Rubrique) is-invalid @enderror text-white" 
                                   id="{{ $rub->Rubrique }}" 
                                   name="{{ $rub->Rubrique }}">
                        @endif
                        @error($rub->Rubrique)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            @endforeach
        </div>

        {{-- <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Créer Document</button>
        </div> --}}
    </form>
</div>