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
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white px-4">Liste des Documents</h2>
    <a href="{{ route('documents.create') }}" class="inline-flex items-center px-4 py-2 bg-teal-400 hover:bg-teal-500 text-white text-sm font-medium rounded-md shadow-md">
        <i class="bi bi-plus-lg me-1"></i> Ajouter Document
    </a>
</div>

    <livewire:search-document documents="$documents" />

@endsection
