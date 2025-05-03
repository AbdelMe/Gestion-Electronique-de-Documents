@extends('layouts.app')
@section('title', 'Assign Role To User')
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
    <h2 class="text-2xl font-bold text-gray-700 mb-6 dark:text-gray-300">Assigner un rôle à un utilisateur selon l'entreprise</h2>
    <form action="{{ route('roles.assignRoleStore') }}" method="POST" class="space-y-6">
        @csrf
        <div class="max-w-md">
            <label for="role" class="block text-gray-700 font-medium mb-2 dark:text-gray-300">Rôle</label>
            <select id="role" name="role_id" required
                class="w-full border-2 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-700">
                <option value="" selected disabled>-- Sélectionnez un rôle --</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        @livewire('get-users-according-to-the-company')
        <div>
            <button type="submit"
                class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded-md shadow">
                Assigner le rôle
            </button>
        </div>
    </form>
@endsection
