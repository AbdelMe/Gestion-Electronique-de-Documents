@extends('layouts.app')
@section('title','Documents')

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
@endsection
@section('content')
    <div class="container mt-1">
        <h2 class="mb-4 text-white">Liste des Documents</h2>
        <a href="#" class="btn btn-success mb-3"><i class="bi bi-plus-lg"></i> Ajouter
            Document</a>
        <table class="table table-bordered table-striped text-white">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>LibelleDocument</th>
                    <th>DocumentNumerique</th>
                    <th>CheminDocument</th>
                    <th>Date</th>
                    <th>Dossier</th>
                    <th>Type Document</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $documents)
                    <tr>
                        <td>{{ $document->id }}</td>
                        <td>{{ $document->LibelleDocument }}</td>
                        <td>{{ $document->DocumentNumerique }}</td>
                        <td>{{ $document->CheminDocument }}</td>
                        <td>{{ $document->Date }}</td>
                        {{-- <td>{{ $document->Dossier }}</td> --}}
                        {{-- <td>{{ $document->Email }}</td> --}}
                        {{-- <td class="text-center">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('entreprise.show', $entreprise->id) }}"
                                    class="btn btn-info btn-sm px-2 py-1 mx-1">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href={{ route('entreprise.edit', $entreprise->id) }}
                                    class="btn btn-warning btn-sm px-2 py-1 mx-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('entreprise.destroy', $entreprise->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce Entreprise ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm px-2 py-1 mx-1">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <p>{{ $entreprises->links() }}</p> --}}
    </div>
@endsection