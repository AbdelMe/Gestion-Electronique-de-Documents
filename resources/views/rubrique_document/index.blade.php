@extends('layouts.app')

@section('title', 'Rubrique Document')

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
        <h2 class="mb-4 text-white">Rubrique Document Liste</h2>
        {{-- <a href={{ route('rubrique_document.create') }} class="btn btn-success mb-3"><i class="bi bi-plus-lg"></i> Ajouter
            Rubrique Document</a> --}}
        <table class="table text-white">
            <thead style="background: linear-gradient(90deg, #131d27 0%, #496683 100%)">
                <tr>
                    <th class="text-light">#</th>
                    <th class="text-light">Rubrique</th>
                    <th class="text-light">Document</th>
                    {{-- <th>Valeur</th> --}}
                    <th class="text-light">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rubs_docs as $r_d)
                    <tr style="background: linear-gradient(90deg, #496683 0%, #131d27 100%);">
                        <td>{{ $r_d->id }}</td>
                        <td>{{ $r_d->Rubrique->Rubrique }}</td>
                        <td>{{ $r_d->Document->titre }}</td>
                        {{-- <td>{{ $r_d->Valeur }}</td> --}}
                        <td class="text-center">
                            <div class="d-inline-flex gap-2">
                                <a href={{ route('rubrique_document.edit', $r_d->id) }} class="btn">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('rubrique_document.destroy', $r_d->id) }}" method="POST"
                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce Rubrique Document ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>{{ $rubs_docs->links() }}</p>
    </div>
@endsection
