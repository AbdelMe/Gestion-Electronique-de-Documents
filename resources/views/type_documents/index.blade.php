@extends('layouts.app')

@section('title', 'Type Document')

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
        <h2 class="mb-4 text-white">Type Document Liste</h2>
        <a href={{ route('type_documents.create') }} class="btn btn-success mb-3"><i class="bi bi-plus-lg"></i> Ajouter Type
            Document</a>
        <table class="table table-bordered table-striped text-white">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Type Document</th>
                    <th>Dureé (année)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($type_documents as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->TypeDocument }}</td>
                        <td>{{ $type->DureeVie . " ans"}}</td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-2">
                                <a href={{ route('type_documents.edit', $type->id) }} class="btn btn-warning btn-sm px-2 py-1 mx-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('type_documents.destroy', $type->id) }}" method="POST"
                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce Type ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm px-2 py-1 mx-1">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>{{ $type_documents->links() }}</p>
    </div>
@endsection
