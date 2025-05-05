@extends('layouts.app')
@section('title', 'Assign Role To User')
@section('content')
<h2 class="text-2xl font-bold text-gray-700 mb-2 dark:text-gray-300">
    Révoquer un rôle d'un utilisateur
</h2>

@livewire('revoke-role-from-user')

@endsection
