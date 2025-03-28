@extends('layouts.app')

@section('title', 'Rubrique')

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
        <h2 class="mb-4 text-white">Liste des Rubriques</h2>
        <a href={{ route('rubrique.create') }} class="btn btn-success mb-3"><i class="bi bi-plus-lg"></i> Ajouter
            Rubrique</a>
        <table class="table table-bordered table-striped text-white">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Type Rubrique</th>
                    <th>Type Document</th>
                    <th>Rubrique Nom</th>
                    {{-- <th>Valeur</th> --}}
                    {{-- <th>Obligatoire</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rubriques as $rubrique)
                    <tr>
                        <td>{{ $rubrique->id }}</td>
                        <td>{{ $rubrique->TypeRubrique->TypeRubrique }}</td>
                        <td>{{ $rubrique->TypeDocument->TypeDocument }}</td>
                        <td>{{ $rubrique->Rubrique }}</td>
                        {{-- <td>{{ $rubrique->Valeur }}</td> --}}
                        {{-- <td>{{ $rubrique->Obligatoire == 1 ? 'OUI' : 'NON' }}</td> --}}
                        <td class="text-center">
                            <div class="d-inline-flex gap-2">
                                {{-- <a href="{{ route('rubrique.show', $document->id) }}"
                                class="btn btn-info btn-sm px-2 py-1 mx-1">
                                <i class="bi bi-eye-fill"></i>
                            </a> --}}
                                <a href={{ route('rubrique.edit', $rubrique->id) }}
                                    class="btn btn-warning btn-sm px-2 py-1 mx-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('rubrique.destroy', $rubrique->id) }}" method="POST"
                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce Rubrique ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm px-2 py-1 mx-1">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>{{ $rubriques->links() }}</p>
    </div>
@endsection
