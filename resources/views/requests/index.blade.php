@extends('layouts.app')

@section('title', 'Toutes les Demandes')

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
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Liste des Demandes</h2>
        </div>
        <x-export-buttons table-id="getData" />


        @if ($requests->isEmpty())
            <p class="text-gray-600 dark:text-gray-300">Aucune demande trouvée.</p>
        @else
            <div class="overflow-x-auto bg-white rounded-lg shadow-md dark:border-gray-800 dark:bg-white/[0.03]">
                <table id="getData" class="min-w-full text-sm text-gray-800">
                    <thead>
                        <tr class="border-b dark:border-gray-800 dark:text-white">
                            <th class="px-6 py-4 text-left font-semibold">#</th>
                            <th class="px-6 py-4 text-left font-semibold">Utilisateur</th>
                            <th class="px-6 py-4 text-left font-semibold">Type</th>
                            <th class="px-6 py-4 text-left font-semibold">Nom</th>
                            <th class="px-6 py-4 text-left font-semibold">Description</th>
                            <th class="px-6 py-4 text-left font-semibold">Statut</th>
                            <th class="px-6 py-4 text-left font-semibold">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($requests as $request)
                            <tr
                                class="hover:bg-gray-50 dark:hover:bg-gray-900 border-b dark:border-gray-800 dark:text-white">
                                <td class="px-6 py-4 border-b dark:border-gray-800">{{ $request->id }}</td>
                                <td class="px-6 py-4 border-b dark:border-gray-800">{{ $request->user->first_name }}
                                    {{ $request->user->last_name }}</td>
                                <td class="px-6 py-4 border-b dark:border-gray-800 capitalize">{{ $request->type }}</td>
                                <td class="px-6 py-4 border-b dark:border-gray-800">{{ $request->name }}</td>
                                <td class="px-6 py-4 border-b dark:border-gray-800">{{ $request->description }}</td>
                                <td class="px-6 py-4 border-b dark:border-gray-800">
                                    <span
                                        class="inline-block px-2 py-1 text-xs font-semibold rounded-full
                                    {{ $request->status === 'approved'
                                        ? 'bg-green-100 text-green-700'
                                        : ($request->status === 'rejected'
                                            ? 'bg-red-100 text-red-700'
                                            : 'bg-yellow-100 text-yellow-700') }}">
                                        {{ ucfirst($request->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 border-b dark:border-gray-800">
                                    {{ $request->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
<x-export-scripts />
