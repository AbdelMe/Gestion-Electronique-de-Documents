@extends('layouts.app')
@section('title', 'Ajouter une Permission')

@section('content')
<div class="container mt-3">
    <h2 class="mb-4 text-dark fw-bold">Ajouter une Permission</h2>

    <form action="{{ route('permitions.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label fw-medium">Nom de la Permission</label>
            <input type="text" class="form-control border-2" id="name" name="name" placeholder="Ex: Gérer les utilisateurs" required>
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
            <a href="{{ route('permitions.index') }}" class="btn btn-secondary fw-medium px-4 py-2">Annuler</a>
        </div>
    </form>
</div>
@endsection