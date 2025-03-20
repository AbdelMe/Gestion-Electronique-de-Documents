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

                    {{-- <a href="#" onclick="redirectToSelectedType()" class="btn btn-primary mt-2">Generate</a> --}}

                    @error('type_document_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- <script>
                    function redirectToSelectedType() {
                        let selectedValue = document.getElementById("type_document_id").value;
                        if (selectedValue) {
                            window.location.href = "{{ route('documents.SelectedType') }}?type_document_id=" + selectedValue;
                        } else {
                            alert("Veuillez sélectionner un type de document.");
                        }
                    }
                </script> --}}

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
                {{-- <input type={{$rebrique->Valeur}} name="" id="" {{$rebrique->Obligatoire == 1 ? 'required' : ''}}> --}}
            @endisset

        </div>
        {{-- <h1 style="width: ;height: ;">selected type = {{ $selected_type }}</h1> --}}
        <div>
            @foreach ($rebrique as $rub)
                {{-- @if ($rub->typeRubrique->Hauteur > 50)
                    <div>
                        <label style="width: 200px" for="">{{ $rub->Rubrique }}</label>
                        <textarea name="" id="" cols={{$rub->typeRubrique->Hauteur}} rows={{$rub->typeRubrique->Largeur}}></textarea>
                    </div>
                @endif --}}


                @if ($rub->typeRubrique->Hauteur !== null && $rub->typeRubrique->Largeur !== null)
                    <div>
                        <label style="width: 200px" for="">{{ $rub->Rubrique }}</label>
                        <input type="{{ $rub->typeRubrique->TypeRubrique }}" name="" id=""
                            style="width: {{ $rub->typeRubrique->Largeur }}px; height: {{ $rub->typeRubrique->Hauteur }}px;">
                    </div>
                @else
                    <div>
                        <label style="width: 200px" for="">{{ $rub->Rubrique }}</label>
                        <input type="{{ $rub->typeRubrique->TypeRubrique }}" name="" id="">
                    </div>
                @endif
            @endforeach

        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success">Créer Document</button>
        </div>
    </form>
</div>
