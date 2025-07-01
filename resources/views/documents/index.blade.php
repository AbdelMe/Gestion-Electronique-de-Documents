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
@if (auth()->user()->getRoleNames()->contains('archivist') || auth()->user()->getRoleNames()->contains('super admin') || auth()->user()->is_archivist == 1)
    <div class="flex justify-between items-center mb-4 mt-12">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white px-4">Liste des Documents</h2>
        <a href="{{ route('documents.create') }}" class="inline-flex items-center px-4 text-indigo-700 border hover:text-white border-indigo-600 py-2 hover:bg-indigo-700  dark:text-white text-sm font-medium rounded-xl shadow-sm transition-colors duration-200">
            <i class="bi bi-plus-lg me-1"></i> Ajouter Document
        </a>
    </div>
@endif

    <livewire:search-document documents="$documents" />

@endsection
