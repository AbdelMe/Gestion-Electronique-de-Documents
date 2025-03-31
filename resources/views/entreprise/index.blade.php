@extends('layouts.app')
@section('title')
    Entreprise
@endsection
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
        <h2 class="mb-4 text-dark">Liste des Entreprises</h2>
        <a href={{ route('entreprise.create') }} class="btn btn-success mb-3"><i class="bi bi-plus-lg"></i> Ajouter
            Entreprise</a>
        <table class="table text-light">
            <thead style="background: linear-gradient(90deg, #131d27 0%, #496683 100%)">
                <tr>
                    <th class="text-light">#</th>
                    {{-- <th class="text-light">Raison Sociale</th> --}}
                    <th class="text-light">Departement</th>
                    {{-- <th class="text-light">Adresse</th>
                    <th class="text-light">Ville</th>
                    <th class="text-light">Fax</th>
                    <th class="text-light">Email</th> --}}
                    <th class="text-light">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entreprises as $entreprise)
                    <tr style="background: linear-gradient(90deg, #496683 0%, #131d27 100%);">
                        <td>{{ $entreprise->id }}</td>
                        {{-- <td>{{ $entreprise->RaisonSocial }}</td> --}}
                        <td>{{ $entreprise->NomClient }}</td>
                        {{-- <td>{{ $entreprise->Adresse }}</td>
                        <td>{{ $entreprise->Ville }}</td>
                        <td>{{ $entreprise->Tel }}</td>
                        <td>{{ $entreprise->Email }}</td> --}}
                        <td class="text-center">
                            <div class="d-inline-flex gap-2">
                                {{-- <a href="{{ route('entreprise.show', $entreprise->id) }}"
                                    class="btn">
                                    <i class="bi bi-eye-fill"></i>
                                </a> --}}
                                <a href={{ route('entreprise.edit', $entreprise->id) }}
                                    class="btn">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('entreprise.destroy', $entreprise->id) }}" method="POST"
                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce Entreprise ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>{{ $entreprises->links() }}</p>
    </div>
@endsection
