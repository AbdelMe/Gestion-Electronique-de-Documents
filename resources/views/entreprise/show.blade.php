@extends('layouts.app')

@section('title', 'Entreprise Details')

@section('content')
    <div class="container">
        <h2 class="mb-4 text-center">Entreprise Details</h2>

        <div class="card shadow-lg">
            <div class="card-header bg-success text-white">
                <h5 class="card-title mb-0">{{ $entreprise->RaisonSocial }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-3"><strong>Nom Client:</strong> {{ $entreprise->NomClient }}</p>
                        <p class="mb-3"><strong>Adresse:</strong> {{ $entreprise->Adresse }}</p>
                        <p class="mb-3"><strong>Ville:</strong> {{ $entreprise->Ville }}</p>
                        <p class="mb-3"><strong>Email:</strong> <a href="mailto:{{ $entreprise->Email }}">{{ $entreprise->Email }}</a></p>
                        <p class="mb-3"><strong>Tel:</strong> <a href="tel:{{ $entreprise->Tel }}">{{ $entreprise->Tel }}</a></p>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-3"><strong>Fax:</strong> {{ $entreprise->Fax }}</p>
                        <p class="mb-3"><strong>TP:</strong> {{ $entreprise->TP }}</p>
                        <p class="mb-3"><strong>Registre Commerce:</strong> {{ $entreprise->RegistreCommerce }}</p>
                        <p class="mb-3"><strong>Identification Fiscale:</strong> {{ $entreprise->IdentificationFiscale }}</p>
                        <p class="mb-3"><strong>CNSS:</strong> {{ $entreprise->CNSS }}</p>
                        <p class="mb-3"><strong>ICE:</strong> {{ $entreprise->ICE }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="mb-0"><strong>Observation:</strong> {{ $entreprise->Observation }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('entreprise.index') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-arrow-left me-2"></i>Back to List
                </a>
            </div>
        </div>
    </div>
@endsection