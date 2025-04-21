@extends('layouts.app')
@section('title', 'Ajouter un Role')

@section('content')
<div class="container mt-3">
    <h2 class="mb-4 text-dark fw-bold">Ajouter un Role</h2>

    <form action="{{ route('roles.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label fw-medium">Nom du Rôle</label>
            <input type="text" class="form-control border-2" id="name" name="name" placeholder="Ex: Admin" required>
        </div>

        <div class="mb-4 col-md-6 p-0">
            <label for="user_id" class="form-label fw-medium">Utilisateur</label>
            <select name="user_id" id="user_id" class="form-control border-2" required>
                <option value="" selected disabled>-- Sélectionnez un utilisateur --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success fw-medium px-4 py-2">Enregistrer</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary fw-medium px-4 py-2">Annuler</a>
        </div>
    </form>
</div>
@endsection