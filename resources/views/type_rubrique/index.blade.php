@extends('layouts.app')
@section('title','Type Rubrique')

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
    <h2 class="mb-4 text-white">Type Rubrique Liste</h2>
    <a href={{ route('type_rubrique.create') }} class="btn btn-success mb-3"><i class="bi bi-plus-lg"></i> Ajouter Type Rubrique</a>
    <table class="table table-bordered table-striped text-white">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Type Rubrique</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($type_rubrique as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->TypeRubrique}}</td>
                    <td class="text-center">
                        <div class="d-inline-flex gap-2">
                            <a href={{ route('type_rubrique.edit', $type->id) }} class="btn btn-warning btn-sm px-2 py-1 mx-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('type_rubrique.destroy', $type->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce Type ?');">
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
    <p>{{ $type_rubrique->links() }}</p>
</div>
@endsection
