@extends('layouts.app')

@section('title', 'Créer Document')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Créer Document</h2>
        <h1>@isset($selectedType)
            {{$selectedType}}
        @endisset
    </h1>

        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="type_document_id">Type Document</label>
                        <select class="form-control @error('type_document_id') is-invalid @enderror text-white" id="type_document_id" name="type_document_id" required>
                            <option value="">Sélectionnez un type de document</option>
                            @foreach($typeDocuments as $typeDocument)
                                <option value="{{ $typeDocument->id }}" {{ old('type_document_id') == $typeDocument->id ? 'selected' : '' }}>
                                    {{ $typeDocument->TypeDocument }}
                                </option>
                            @endforeach
                        </select>
                    
                        <a href="#" onclick="redirectToSelectedType()" class="btn btn-success mb-3">Generate</a>
                    
                        @error('type_document_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <script>
                        function redirectToSelectedType() {
                            let selectedValue = document.getElementById("type_document_id").value;
                            if (selectedValue) {
                                window.location.href = "{{ route('documents.SelectedType') }}?type_document_id=" + selectedValue;
                            } else {
                                alert("Veuillez sélectionner un type de document.");
                            }
                        }
                    </script>
                    
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="dossier_id">Dossier</label>
                        <select class="form-control @error('dossier_id') is-invalid @enderror text-white" id="dossier_id" name="dossier_id" required>
                            <option value="">Sélectionnez un dossier</option>
                            @foreach($dossiers as $dossier)
                                <option value="{{ $dossier->id }}" {{ old('dossier_id') == $dossier->id ? 'selected' : '' }}>
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
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Créer Document</button>
            </div>
        </form>
    </div>
@endsection