@extends('layouts.app')
@section('title', 'Documents')

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
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-dark">Liste des Documents</h2>
        <a href="{{ route('documents.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg me-1"></i> Ajouter Document
        </a>
    </div>
    <livewire:search-document documents="$documents" />

@endsection
