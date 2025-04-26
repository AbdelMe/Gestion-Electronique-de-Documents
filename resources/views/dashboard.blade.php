@extends('layouts.app')

@section('title', 'Dashboard')
@if (session('updated'))
    <x-toast-success-alert message="{{ session('updated') }}" />
@endif

@section('content')
@php
$lastMonthEntreprises = 12;
$lastMonthClasse = 20;
$lastMonthDossiers = 8;
$lastMonthDocuments = 15;

$entreprisesChange = count($entreprises) - $lastMonthEntreprises;
// $classeChange = count($classe) - $lastMonthClasse;
$dossiersChange = count($dossiers) - $lastMonthDossiers;
$documentsChange = count($documents) - $lastMonthDocuments;
@endphp
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Tableau de Bord</h1>
            <div class="text-sm text-gray-500">
                {{ now()->format('l, F j, Y') }}
            </div>
        </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                    <!-- Entreprises Card -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 mb-1">Entreprises</p>
                                    <div class="flex items-end gap-2">
                                        <h3 class="text-3xl font-bold text-gray-800">{{ count($entreprises ?? []) }}</h3>
                                        <span class="text-sm font-medium px-2 py-0.5 rounded-full {{ $entreprisesChange > 0 ? 'bg-green-100 text-green-800' : ($entreprisesChange < 0 ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ $entreprisesChange > 0 ? "↑ +$entreprisesChange" : ($entreprisesChange < 0 ? "↓ $entreprisesChange" : "→ Stable") }}
                                        </span>
                                    </div>
                                </div>
                                <div class="p-3 rounded-lg text-blue-600">
                                    <i class="bi bi-building text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                                <p class="text-sm text-gray-500">Depuis le mois dernier</p>
                                <a href="{{ route('entreprise.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 flex items-center gap-1">
                                    Voir toutes <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
        
                    <!-- Dossiers Card -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 mb-1">Dossiers</p>
                                    <div class="flex items-end gap-2">
                                        <h3 class="text-3xl font-bold text-gray-800">{{ count($dossiers ?? []) }}</h3>
                                        <span class="text-sm font-medium px-2 py-0.5 rounded-full {{ $dossiersChange > 0 ? 'bg-green-100 text-green-800' : ($dossiersChange < 0 ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ $dossiersChange > 0 ? "↑ +$dossiersChange" : ($dossiersChange < 0 ? "↓ $dossiersChange" : "→ Stable") }}
                                        </span>
                                    </div>
                                </div>
                                <div class="p-3 rounded-lg text-indigo-600">
                                    <i class="bi bi-folder text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                                <p class="text-sm text-gray-500">Depuis le mois dernier</p>
                                <a href="{{ route('dossiers.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800 flex items-center gap-1">
                                    Voir tous <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
        
                    <!-- Documents Card -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 mb-1">Documents</p>
                                    <div class="flex items-end gap-2">
                                        <h3 class="text-3xl font-bold text-gray-800">{{ count($documents ?? []) }}</h3>
                                        <span class="text-sm font-medium px-2 py-0.5 rounded-full {{ $documentsChange > 0 ? 'bg-green-100 text-green-800' : ($documentsChange < 0 ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ $documentsChange > 0 ? "↑ +$documentsChange" : ($documentsChange < 0 ? "↓ $documentsChange" : "→ Stable") }}
                                        </span>
                                    </div>
                                </div>
                                <div class="p-3 rounded-lg text-emerald-600">
                                    <i class="bi bi-file-earmark text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center">
                                <p class="text-sm text-gray-500">Depuis le mois dernier</p>
                                <a href="{{ route('documents.index') }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-800 flex items-center gap-1">
                                    Voir tous <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        
        <!-- Quick Actions Section -->
        <div class="mb-10">
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <h4 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                    </svg>
                    Actions rapides
                </h4>
        
                @php
                $buttons = [
                    ['route' => 'entreprise.create', 'color' => 'amber', 'icon' => 'bi-building', 'label' => 'Créer Entreprise'],
                    ['route' => 'classe.create', 'color' => 'blue', 'icon' => 'bi-collection', 'label' => 'Créer Classe'],
                    ['route' => 'dossiers.create', 'color' => 'indigo', 'icon' => 'bi-folder', 'label' => 'Créer Dossier'],
                    ['route' => 'documents.create', 'color' => 'emerald', 'icon' => 'bi-file-earmark', 'label' => 'Créer Document'],
                ];
                @endphp
        
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
                    @foreach ($buttons as $btn)
                        <a href="{{ route($btn['route']) }}"
                           class="group flex items-center justify-center gap-4 rounded-xl bg-white border border-{{ $btn['color'] }}-200 hover:border-{{ $btn['color'] }}-400 hover:bg-{{ $btn['color'] }}-50 transition-all duration-300 shadow-sm hover:shadow-md transform hover:-translate-y-1">
                            <div class="p-3 rounded-full text-{{ $btn['color'] }}-600 flex items-center justify-center">
                                <i class="bi {{ $btn['icon'] }} text-xl"></i>
                            </div>
                            <span class="font-semibold text-gray-700 group-hover:text-{{ $btn['color'] }}-700 transition-colors">
                                {{ $btn['label'] }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        



        <!-- Recent Activities Section -->
        <div class="mb-8">
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
                <div class="p-6">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                        Activités récentes
                    </h4>
                    
                    <div class="space-y-3">
                        @foreach ($recentActivities as $activity)
                            <div class="p-4 rounded-lg border border-gray-100 hover:bg-gray-50 transition-colors duration-200 flex justify-between items-center">
                                <div class="flex items-start gap-3">
                                    <div class="mt-1 p-2 rounded-lg {{ $activity['is_new'] ? 'bg-blue-100 text-blue-600' : 'bg-gray-100 text-gray-600' }}">
                                        @if ($activity['type'] === 'document')
                                            <i class="bi bi-file-earmark text-lg"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">
                                            @if ($activity['type'] === 'document')
                                                Nouveau Document
                                            @endif
                                        </p>
                                        <p class="text-sm text-gray-500">{{ $activity['name'] }}</p>
                                        <p class="text-xs text-gray-400 mt-1">Créé le {{ $activity['created_at']->format('d/m/Y à H:i') }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    @if ($activity['is_new'])
                                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Nouveau</span>
                                    @endif
                                    <a href="{{ route('documents.show', $activity['id']) }}" class="text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 px-3 py-1.5 rounded-lg transition duration-200 flex items-center gap-1">
                                        <i class="bi bi-eye"></i> Voir
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    @if(count($recentActivities) > 3)
                        <div class="mt-4 text-center">
                            <a href="{{ route('documents.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 inline-flex items-center">
                                Voir toutes les activités <i class="bi bi-chevron-down ml-1"></i>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection