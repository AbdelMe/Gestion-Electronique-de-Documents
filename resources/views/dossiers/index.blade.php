@extends('layouts.app')

@section('title', 'Dossiers')

@section('alert')
    @if (session('updated'))
        <x-toast-success-alert message="{{ session('updated') }}" />
    @endif
    @if (session('deleted'))
        <x-toast-delete-alert message="{{ session('deleted') }}" />
    @endif
    @if (session('Added'))
        <x-toast-success-alert message="{{ session('Added') }}" />
    @endif
    @if (session('warning'))
        <x-toast-warning-alert message="{{ session('warning') }}" />
    @endif
@endsection

@section('content')
    <div class="container mt-1">
        <h2 class="mb-4 text-white">Liste des dossiers</h2>
        <a href="{{ route('dossiers.create') }}" class="btn btn-success mb-3">
            <i class="bi bi-plus-lg"></i> Ajouter Dossier
        </a>
        <table class="table text-white">
            <thead style="background: linear-gradient(90deg, #131d27 0%, #496683 100%)">
                <tr>
                    <th class="text-light">#</th>
                    <th class="text-light">Entreprise</th>
                    <th class="text-light">Nom Dossier</th>
                    <th class="text-light">Année</th>
                    <th class="text-light">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dossiers as $dossier)
                    <tr style="background: linear-gradient(90deg, #496683 0%, #131d27 100%);">
                        <td>{{ $dossier->id }}</td>
                        <td>{{ $dossier->entreprise->NomClient }}</td>
                        <td><a href={{ route('dossiers.show', $dossier->id)}}> <img src="{{ asset('assets/images/icons/folder.png') }}" width="24px"
                                    style="margin-right: 8px" alt="Dashboard Icon">
                                {{ $dossier->Dossier }}</a></td>
                        <td>{{ $dossier->Annee }}</td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('dossiers.edit', $dossier->id) }}" class="btn">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('dossiers.destroy', $dossier->id) }}" method="POST"
                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce dossier ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn ">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>{{ $dossiers->links() }}</p>
        
    </div>
    
@endsection
