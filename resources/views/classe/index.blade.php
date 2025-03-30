@extends('layouts.app')

@section('title','Classe')

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
        <h2 class="mb-4 text-white">Liste des Classes</h2>
        <a href={{ route('classe.create') }} class="btn btn-success mb-3"><i class="bi bi-plus-lg"></i> Ajouter Classe</a>
        <table class="table text-white">
            <thead  style="background: linear-gradient(90deg, #131d27 0%, #496683 100%)">
                <tr>
                    <th class="text-light">#</th>
                    <th class="text-light">Classe</th>
                    <th class="text-light">Action</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($classes as $classe)
                    <tr style="background: linear-gradient(90deg, #496683 0%, #131d27 100%);">
                        <td>{{ $classe->id }}</td>
                        <td>{{ $classe->classe }}</td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('classe.edit', $classe->id) }}" class="btn btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('classe.destroy', $classe->id) }}" method="POST"
                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce Classe ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm ">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <p>{{ $classes->links() }}</p>
    </div>
@endsection
