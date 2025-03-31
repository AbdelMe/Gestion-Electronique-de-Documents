@extends('layouts.app')

@section('title', 'Dashboard')
@if (session('updated'))
    <x-toast-success-alert message="{{ session('updated') }}" />
@endif

@section('content')
    <h1 class="text-dark">Dashboard</h1>
    <div class="row mb-4">
        <div class="col-12">
            <div>
                <div style="outline:none; background: linear-gradient(90deg, #496683 0%, #131d27 100%);padding: 20px">
                    <h4 class="card-title">Actions rapides</h4>
<<<<<<< HEAD
                    <a href="{{ route('entreprise.create') }}" class="btn btn-outline-warning mb-2"><i class="bi bi-plus-lg"></i> Créer Entreprise</a>
                    <a href="{{ route('classe.create') }}" class="btn btn-outline-info mb-2"><i class="bi bi-plus-lg"></i> Créer Service</a>
                    <a href="{{ route('dossiers.create') }}" class="btn btn-outline-primary mb-2"><i class="bi bi-plus-lg"></i> Créer Dossier</a>
                    <a href="{{ route('documents.create') }}" class="btn btn-outline-success mb-2"><i class="bi bi-plus-lg"></i> Créer Document</a>
=======
                    <a href="{{ route('entreprise.create') }}" class="btn btn-warning mb-2"><i class="bi bi-plus-lg"></i>
                        Créer Entreprise</a>
                    <a href="{{ route('services.create') }}" class="btn btn-info mb-2"><i class="bi bi-plus-lg"></i> Créer
                        Service</a>
                    <a href="{{ route('dossiers.create') }}" class="btn btn-primary mb-2"><i class="bi bi-plus-lg"></i>
                        Créer Dossier</a>
                    <a href="{{ route('documents.create') }}" class="btn btn-success mb-2"><i class="bi bi-plus-lg"></i>
                        Créer Document</a>
>>>>>>> 0b800275a665b0abd2dec4ca8d31d2b90f4c544f
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @php
            $lastMonthEntreprises = 12;
            $lastMonthClasse = 20;
            $lastMonthDossiers = 8;
            $lastMonthDocuments = 15;

            $entreprisesChange = count($entreprises) - $lastMonthEntreprises;
            $classeChange = count($classe) - $lastMonthClasse;
            $dossiersChange = count($dossiers) - $lastMonthDossiers;
            $documentsChange = count($documents) - $lastMonthDocuments;
        @endphp

        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div>
                <div style="outline:none; background: linear-gradient(90deg, #496683 0%, #131d27 100%);padding: 30px">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ count($entreprises) }}</h3>
<<<<<<< HEAD
                                <p class="ml-2 mb-0 font-weight-medium text-{{ $entreprisesChange > 0 ? 'success' : ($entreprisesChange < 0 ? 'danger' : 'muted') }}">
                                    {{ $entreprisesChange > 0 ? "+$entreprisesChange Nouveau" : ($entreprisesChange < 0 ? "$entreprisesChange Supprimé" : "Ecurie") }}
=======
                                <p
                                    class="ml-2 mb-0 font-weight-medium text-{{ $entreprisesChange > 0 ? 'success' : ($entreprisesChange < 0 ? 'danger' : 'muted') }}">
                                    {{ $entreprisesChange > 0 ? "+$entreprisesChange Nouveau" : ($entreprisesChange < 0 ? "$entreprisesChange Supprimé" : "Stable") }}
>>>>>>> 0b800275a665b0abd2dec4ca8d31d2b90f4c544f
                                </p>
                            </div>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('entreprise.index') }}" class="text-dark">
                                <div class="icon icon-box-primary">
                                    <span class="mdi mdi-arrow-right icon-item"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <h6 class="font-weight-normal text-light">Nombre d'entreprises</h6>
                </div>
            </div>
        </div>

        {{-- <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ count($services) }}</h3>
<<<<<<< HEAD
                                <p class="ml-2 mb-0 font-weight-medium text-{{ $servicesChange > 0 ? 'success' : ($servicesChange < 0 ? 'danger' : 'muted') }}">
                                    {{ $servicesChange > 0 ? "+$servicesChange Nouveau" : ($servicesChange < 0 ? "$servicesChange Supprimé" : "Ecurie") }}
=======
                                <p
                                    class="ml-2 mb-0 font-weight-medium text-{{ $servicesChange > 0 ? 'success' : ($servicesChange < 0 ? 'danger' : 'muted') }}">
                                    {{ $servicesChange > 0 ? "+$servicesChange Nouveau" : ($servicesChange < 0 ? "$servicesChange Supprimé" : "Stable") }}
>>>>>>> 0b800275a665b0abd2dec4ca8d31d2b90f4c544f
                                </p>
                            </div>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('services.index') }}" class="text-dark">
                                <div class="icon icon-box-primary">
                                    <span class="mdi mdi-arrow-right icon-item"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Nombre de services</h6>
                </div>
            </div>
        </div> --}}

        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div>
                <div style="outline:none; background: linear-gradient(90deg, #496683 0%, #131d27 100%);padding: 30px">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ count($dossiers) }}</h3>
<<<<<<< HEAD
                                <p class="ml-2 mb-0 font-weight-medium text-{{ $dossiersChange > 0 ? 'success' : ($dossiersChange < 0 ? 'danger' : 'primary') }}">
                                    {{ $dossiersChange > 0 ? "+$dossiersChange Nouveau" : ($dossiersChange < 0 ? "$dossiersChange Supprimé" : "Ecurie") }}
=======
                                <p
                                    class="ml-2 mb-0 font-weight-medium text-{{ $dossiersChange > 0 ? 'success' : ($dossiersChange < 0 ? 'danger' : 'muted') }}">
                                    {{ $dossiersChange > 0 ? "+$dossiersChange Nouveau" : ($dossiersChange < 0 ? "$dossiersChange Supprimé" : "Stable") }}
>>>>>>> 0b800275a665b0abd2dec4ca8d31d2b90f4c544f
                                </p>
                            </div>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('dossiers.index') }}" class="text-dark">
                                <div class="icon icon-box-primary">
                                    <span class="mdi mdi-arrow-right icon-item"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <h6 class="font-weight-normal text-light">Nombre de dossiers</h6>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div>
                <div style="outline:none; background: linear-gradient(90deg, #496683 0%, #131d27 100%);padding: 30px">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ count($documents) }}</h3>
<<<<<<< HEAD
                                <p class="ml-2 mb-0 font-weight-medium text-{{ $documentsChange > 0 ? 'success' : ($documentsChange < 0 ? 'danger' : 'muted') }}">
                                    {{ $documentsChange > 0 ? "+$documentsChange Nouveau" : ($documentsChange < 0 ? "$documentsChange Supprimé" : "Ecurie") }}
=======
                                <p
                                    class="ml-2 mb-0 font-weight-medium text-{{ $documentsChange > 0 ? 'success' : ($documentsChange < 0 ? 'danger' : 'muted') }}">
                                    {{ $documentsChange > 0 ? "+$documentsChange Nouveau" : ($documentsChange < 0 ? "$documentsChange Supprimé" : "Stable") }}
>>>>>>> 0b800275a665b0abd2dec4ca8d31d2b90f4c544f
                                </p>
                            </div>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('documents.index') }}" class="text-dark">
                                <div class="icon icon-box-primary">
                                    <span class="mdi mdi-arrow-right icon-item"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <h6 class=" font-weight-normal text-light">Nombre de documents</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <div>
                <div style="outline:none; background: linear-gradient(90deg, #496683 0%, #131d27 100%);padding: 30px">
                    <h4 >Activités récentes</h4>
                    <ul class="list-group ">
                        @foreach ($recentActivities as $activity)
<<<<<<< HEAD
                            <li class="list-group-item d-flex justify-content-between text-light align-items-center" style="outline:none; background: linear-gradient(90deg,#496683 0%, #131d27 100%);">
                                <div>
                                    @if ($activity['type'] === 'document')
                                        <strong>Nouveau Document:</strong> {{ $activity['name'] }} (Créé le {{ $activity['created_at']->format('Y-m-d') }})
=======
                            <li class="list-group-item d-flex justify-content-between text-light align-items-center"
                                style="background-color: #232936">
                                <div>
                                    @if ($activity['type'] === 'document')
                                        <strong>Nouveau Document:</strong> {{ $activity['name'] }} (Created on
                                        {{ $activity['created_at']->format('Y-m-d') }})
>>>>>>> 0b800275a665b0abd2dec4ca8d31d2b90f4c544f
                                    @endif
                                </div>
                                <div class="d-flex align-items-center">
                                    @if ($activity['is_new'])
                                        <span class="badge badge-pill badge-success mr-2">Nouveau</span>
                                    @endif
<<<<<<< HEAD
                                    <a href={{ route('documents.show', $activity['id']) }} class="btn btn-outline-light btn-sm rounded-pill">
=======
                                    <a href="{{ asset('storage/' . $activity['file_path']) }}"
                                        class="btn btn-primary btn-sm rounded-pill" target="_blank">
>>>>>>> 0b800275a665b0abd2dec4ca8d31d2b90f4c544f
                                        <i class="bi bi-eye"></i> voir
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection