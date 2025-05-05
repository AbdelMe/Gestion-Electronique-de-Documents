@extends('layouts.app')

@section('title', 'Users Logs')

@section('content')
    <div class="container mx-auto px-4 py-8 ">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Users Historique</h2>
            {{-- <a href="{{ route('dashboard') }}"
            class="inline-flex items-center px-4 py-2 bg-teal-400 hover:bg-teal-500 text-white text-sm font-medium rounded-md shadow-md">
            <i class="bi bi-plus-lg mr-2"></i> Ajouter Entreprise
        </a> --}}
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow-md dark:border-gray-800 dark:bg-white/[0.03]">
            <table class="min-w-full text-sm text-gray-800">
                <thead>
                    <tr class="border-b dark:border-gray-800 dark:text-white">
                        <th class="px-6 py-4 text-left font-semibold">#</th>
                        <th class="px-6 py-4 text-left font-semibold">User</th>
                        <th class="px-6 py-4 text-left font-semibold">Document</th>
                        <th class="px-6 py-4 text-left font-semibold">Date</th>
                        <th class="px-6 py-4 text-left font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($logs as $log)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-900 border-b dark:border-gray-800 dark:text-white">
                            <td class="px-6 py-4 border-b dark:border-gray-800">{{ $log->id }}</td>
                            <td class="px-6 py-4 border-b dark:border-gray-800">{{ $log->user->first_name }}
                                {{ $log->user->last_name }}</td>
                            <td class="px-6 py-4 border-b dark:border-gray-800">
                                {{ $log->document->titre }}
                                <a href="{{ route('documents.show', $log->document->id) }}"
                                    class="ml-2 text-gray-500 hover:text-blue-500 dark:hover:text-blue-400"
                                    title="View Document">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                            </td>
                            <td class="px-6 py-4 border-b dark:border-gray-800">{{ \Carbon\Carbon::parse($log->date)->format('D d M, Y') }}                            </td>
                            <td class="px-6 py-4 border-b dark:border-gray-800">{{ $log->action }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $logs->links() }}
        </div>
    </div>
@endsection
