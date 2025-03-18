@extends('layouts.app')

@section('title','Ajouter Entreprise')
@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Ajouter Entreprise</h2>

        <form action={{ route('entreprise.store') }} method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="RaisonSocial">Raison Sociale</label>
                        <input type="text" class="form-control @error('RaisonSocial') is-invalid @enderror text-white" id="RaisonSocial" name="RaisonSocial" value="{{ old('RaisonSocial', $entreprise->RaisonSocial ?? '') }}" placeholder="Entrez la raison sociale">
                        @error('RaisonSocial')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="NomClient">Nom Client</label>
                        <input type="text" class="form-control @error('NomClient') is-invalid @enderror text-white" id="NomClient" name="NomClient" value="{{ old('NomClient', $entreprise->NomClient ?? '') }}" placeholder="Entrez le nom du client">
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
                        <input type="text" class="form-control @error('Adresse') is-invalid @enderror text-white" id="Adresse" name="Adresse" value="{{ old('Adresse', $entreprise->Adresse ?? '') }}" placeholder="Entrez l'adresse">
                        @error('Adresse')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Ville">Ville</label>
                        <input type="text" class="form-control @error('Ville') is-invalid @enderror text-white" id="Ville" name="Ville" value="{{ old('Ville', $entreprise->Ville ?? '') }}" placeholder="Entrez la ville">
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
                        <input type="text" class="form-control @error('Tel') is-invalid @enderror text-white" id="Tel" name="Tel" value="{{ old('Tel', $entreprise->Tel ?? '') }}" placeholder="Entrez le numéro de téléphone">
                        @error('Tel')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="Fax">Fax</label>
                        <input type="text" class="form-control @error('Fax') is-invalid @enderror text-white" id="Fax" name="Fax" value="{{ old('Fax', $entreprise->Fax ?? '') }}" placeholder="Entrez le numéro de fax">
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
                        <input type="email" class="form-control @error('Email') is-invalid @enderror text-white" id="Email" name="Email" value="{{ old('Email', $entreprise->Email ?? '') }}" placeholder="Entrez l'adresse email">
                        @error('Email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="TP">Type Professionnel</label>
                        <input type="text" class="form-control @error('TP') is-invalid @enderror text-white" id="TP" name="TP" value="{{ old('TP', $entreprise->TP ?? '') }}" placeholder="Entrez le type professionnel">
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
                        <input type="text" class="form-control @error('RegistreCommerce') is-invalid @enderror text-white" id="RegistreCommerce" name="RegistreCommerce" value="{{ old('RegistreCommerce', $entreprise->RegistreCommerce ?? '') }}" placeholder="Entrez le registre de commerce">
                        @error('RegistreCommerce')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="IdentificationFiscale">Identification Fiscale</label>
                        <input type="text" class="form-control @error('IdentificationFiscale') is-invalid @enderror text-white" id="IdentificationFiscale" name="IdentificationFiscale" value="{{ old('IdentificationFiscale', $entreprise->IdentificationFiscale ?? '') }}" placeholder="Entrez l'identification fiscale">
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
                        <input type="text" class="form-control @error('CNSS') is-invalid @enderror text-white" id="CNSS" name="CNSS" value="{{ old('CNSS', $entreprise->CNSS ?? '') }}" placeholder="Entrez le numéro CNSS">
                        @error('CNSS')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="ICE">ICE</label>
                        <input type="text" class="form-control @error('ICE') is-invalid @enderror text-white" id="ICE" name="ICE" value="{{ old('ICE', $entreprise->ICE ?? '') }}" placeholder="Entrez l'identifiant ICE">
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
                        <textarea class="form-control @error('Observation') is-invalid @enderror text-white" id="Observation" name="Observation" placeholder="Entrez une observation">{{ old('Observation', $entreprise->Observation ?? '') }}</textarea>
                        @error('Observation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Ajouter</button>
            </div>
        </form>
    </div>
@endsection