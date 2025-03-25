@extends('layouts.app')

@section('title','Modifier Entreprise')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Modifier Entreprise</h2>

        <form action="{{ route('entreprise.update', $entreprise->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="RaisonSocial">Raison Sociale</label>
                        <input type="text" class="form-control @error('RaisonSocial') is-invalid @enderror text-white" id="RaisonSocial" name="RaisonSocial" value="{{ old('RaisonSocial', $entreprise->RaisonSocial) }}">
                        @error('RaisonSocial')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="NomClient">Nom Client</label>
                        <input type="text" class="form-control @error('NomClient') is-invalid @enderror text-white" id="NomClient" name="NomClient" value="{{ old('NomClient', $entreprise->NomClient) }}">
                        @error('NomClient')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Adresse">Adresse</label>
                        <input type="text" class="form-control @error('Adresse') is-invalid @enderror text-white" id="Adresse" name="Adresse" value="{{ old('Adresse', $entreprise->Adresse) }}">
                        @error('Adresse')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Ville">Ville</label>
                        <input type="text" class="form-control @error('Ville') is-invalid @enderror text-white" id="Ville" name="Ville" value="{{ old('Ville', $entreprise->Ville) }}">
                        @error('Ville')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Tel">Téléphone</label>
                        <input type="text" class="form-control @error('Tel') is-invalid @enderror text-white" id="Tel" name="Tel" value="{{ old('Tel', $entreprise->Tel) }}">
                        @error('Tel')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Fax">Fax</label>
                        <input type="text" class="form-control @error('Fax') is-invalid @enderror text-white" id="Fax" name="Fax" value="{{ old('Fax', $entreprise->Fax) }}">
                        @error('Fax')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control @error('Email') is-invalid @enderror text-white" id="Email" name="Email" value="{{ old('Email', $entreprise->Email) }}">
                        @error('Email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="TP">Type Professionnel</label>
                        <input type="text" class="form-control @error('TP') is-invalid @enderror text-white" id="TP" name="TP" value="{{ old('TP', $entreprise->TP) }}">
                        @error('TP')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="RegistreCommerce">Registre de Commerce</label>
                        <input type="text" class="form-control @error('RegistreCommerce') is-invalid @enderror text-white" id="RegistreCommerce" name="RegistreCommerce" value="{{ old('RegistreCommerce', $entreprise->RegistreCommerce) }}">
                        @error('RegistreCommerce')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="IdentificationFiscale">Identification Fiscale</label>
                        <input type="text" class="form-control @error('IdentificationFiscale') is-invalid @enderror text-white" id="IdentificationFiscale" name="IdentificationFiscale" value="{{ old('IdentificationFiscale', $entreprise->IdentificationFiscale) }}">
                        @error('IdentificationFiscale')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="CNSS">CNSS</label>
                        <input type="text" class="form-control @error('CNSS') is-invalid @enderror text-white" id="CNSS" name="CNSS" value="{{ old('CNSS', $entreprise->CNSS) }}">
                        @error('CNSS')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="ICE">ICE</label>
                        <input type="text" class="form-control @error('ICE') is-invalid @enderror text-white" id="ICE" name="ICE" value="{{ old('ICE', $entreprise->ICE) }}">
                        @error('ICE')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="Observation">Observation</label>
                        <textarea class="form-control @error('Observation') is-invalid @enderror text-white" id="Observation" name="Observation">{{ old('Observation', $entreprise->Observation) }}</textarea>
                        @error('Observation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Mettre à jour</button>
                <a href="{{ route('entreprise.index') }}" class="btn btn-primary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
