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
        <table class="table text-white">
            <thead style="background: linear-gradient(90deg, #131d27 0%, #496683 100%)">
                <tr>
                    <th class="text-light">#</th>
                    <th class="text-light">Type Document</th>
                    <th class="text-light">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($type_documents as $type)
                    <tr style="background: linear-gradient(90deg, #496683 0%, #131d27 100%);">
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->TypeDocument }}</td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-2">
                                <a href={{ route('type_documents.edit', $type->id) }} class="btn">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('type_documents.destroy', $type->id) }}" method="POST"
                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce Type ?');">
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
        <p>{{ $type_documents->links() }}</p>
    </div>
@endsection
