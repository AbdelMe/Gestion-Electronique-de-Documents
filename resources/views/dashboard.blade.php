@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Actions rapides</h4>
                    <a href="{{ route('entreprise.create') }}" class="btn btn-warning mb-2"><i class="bi bi-plus-lg"></i> Créer Entreprise</a>
                    <a href="{{ route('services.create') }}" class="btn btn-info mb-2"><i class="bi bi-plus-lg"></i> Créer Service</a>
                    <a href="{{ route('dossiers.create') }}" class="btn btn-primary mb-2"><i class="bi bi-plus-lg"></i> Créer Dossier</a>
                    <a href="{{ route('documents.create') }}" class="btn btn-success mb-2"><i class="bi bi-plus-lg"></i> Créer Document</a>
                </div>
            </div>
        </div>
    </div>


@endsection