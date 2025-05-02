@extends('layouts.app')

@section('title', 'Dashboard')
@if (session('updated'))
    <x-toast-success-alert message="{{ session('updated') }}" />
@endif

@section('content')
@php
$lastMonthUsers = 12;
$lastMonthClasse = 20;
$lastMonthDossiers = 8;
$lastMonthDocuments = 15;

$usersChanges = count($users) - $lastMonthUsers;
// $classeChange = count($classe) - $lastMonthClasse;
$dossiersChange = count($dossiers) - $lastMonthDossiers;
$documentsChange = count($documents) - $lastMonthDocuments;
@endphp
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Tableau de Bord</h1>
            <div class="text-sm text-gray-500">
                {{ now()->format('l, F j, Y') }}
            </div>
        </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                    <!-- Entreprises Card -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300 dark:border-gray-800 dark:bg-white/[0.03]">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 mb-1 dark:text-white">Users</p>
                                    <div class="flex items-end gap-2">
                                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white">{{ count($users ?? []) }}</h3>
                                        <span class="text-sm font-medium px-2 py-0.5 rounded-full {{ $usersChanges > 0 ? 'bg-green-100 text-green-800' : ($usersChanges < 0 ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ $usersChanges > 0 ? "↑ +$usersChanges" : ($usersChanges < 0 ? "↓ $usersChanges" : "→ Stable") }}
                                        </span>
                                    </div>
                                </div>
                                <div class="p-3 rounded-lg text-blue-600">
                                    <i class="bi bi-building text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center dark:border-gray-800">
                                <p class="text-sm text-gray-500 dark:text-white">Depuis le mois dernier</p>
                                <a href="{{ route('users.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 flex items-center gap-1">
                                    Voir toutes <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
        
                    <!-- Dossiers Card -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300 dark:border-gray-800 dark:bg-white/[0.03]">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 mb-1 dark:text-white">Dossiers</p>
                                    <div class="flex items-end gap-2">
                                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white">{{ count($dossiers ?? []) }}</h3>
                                        <span class="text-sm font-medium px-2 py-0.5 rounded-full {{ $dossiersChange > 0 ? 'bg-green-100 text-green-800' : ($dossiersChange < 0 ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ $dossiersChange > 0 ? "↑ +$dossiersChange" : ($dossiersChange < 0 ? "↓ $dossiersChange" : "→ Stable") }}
                                        </span>
                                    </div>
                                </div>
                                <div class="p-3 rounded-lg text-indigo-600">
                                    <i class="bi bi-folder text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center dark:border-gray-800">
                                <p class="text-sm text-gray-500 dark:text-white">Depuis le mois dernier</p>
                                <a href="{{ route('dossiers.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800 flex items-center gap-1">
                                    Voir tous <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
        
                    <!-- Documents Card -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300 dark:border-gray-800 dark:bg-white/[0.03]">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 mb-1 dark:text-white">Documents</p>
                                    <div class="flex items-end gap-2">
                                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white">{{ count($documents ?? []) }}</h3>
                                        <span class="text-sm font-medium px-2 py-0.5 rounded-full {{ $documentsChange > 0 ? 'bg-green-100 text-green-800' : ($documentsChange < 0 ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ $documentsChange > 0 ? "↑ +$documentsChange" : ($documentsChange < 0 ? "↓ $documentsChange" : "→ Stable") }}
                                        </span>
                                    </div>
                                </div>
                                <div class="p-3 rounded-lg text-emerald-600">
                                    <i class="bi bi-file-earmark text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center dark:border-gray-800">
                                <p class="text-sm text-gray-500 dark:text-white">Depuis le mois dernier</p>
                                <a href="{{ route('documents.index') }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-800 flex items-center gap-1">
                                    Voir tous <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        
        <!-- Quick Actions Section -->
        <div class="mb-10">
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100 dark:border-gray-800 dark:bg-white/[0.03]">
                <h4 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2 dark:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                    </svg>
                    Actions rapides
                </h4>
        
                @php
                $buttons = [
                    ['route' => 'users.AddUser', 'color' => 'gray', 'icon' => 'bi-person', 'label' => 'Créer User'],
                    // ['route' => 'classe.create', 'color' => 'blue', 'icon' => 'bi-collection', 'label' => 'Créer Classe'],
                    ['route' => 'dossiers.create', 'color' => 'indigo', 'icon' => 'bi-folder', 'label' => 'Créer Dossier'],
                    ['route' => 'documents.create', 'color' => 'emerald', 'icon' => 'bi-file-earmark', 'label' => 'Créer Document'],
                ];
                @endphp
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
                    @foreach ($buttons as $btn)
                        <a href="{{ route($btn['route']) }}"
                           class="group flex items-center justify-center gap-4 rounded-xl bg-white border border-{{ $btn['color'] }}-200 hover:border-{{ $btn['color'] }}-400 hover:bg-{{ $btn['color'] }}-50 transition-all duration-300 shadow-sm hover:shadow-md transform hover:-translate-y-1 dark:border-gray-800 dark:bg-white/[0.01]">
                            <div class="p-3 rounded-full text-{{ $btn['color'] }}-600 flex items-center justify-center">
                                <i class="bi {{ $btn['icon'] }} text-xl"></i>
                            </div>
                            <span class="font-semibold text-gray-700 group-hover:text-{{ $btn['color'] }}-700 transition-colors dark:text-gray-300">
                                {{ $btn['label'] }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        



        <div class="mb-8">
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="p-6">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2 dark:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                        Activités récentes
                    </h4>
                    
                    <div class="space-y-3">
                        @foreach ($recentActivities as $activity)
                            <div class="p-4 rounded-xl border border-gray-100 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-900 transition-colors duration-200 flex justify-between items-center">
                                <div class="flex items-start gap-3">
                                    <div class="mt-1 p-2 rounded-xl {{ $activity['is_new'] ? ' text-blue-600' : ' text-gray-600' }}">
                                        @if ($activity['type'] === 'document')
                                            <i class="bi bi-file-earmark text-lg"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800 dark:text-gray-300">
                                            @if ($activity['type'] === 'document')
                                                Nouveau Document
                                            @endif
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-300">{{ $activity['name'] }}</p>
                                        <p class="text-xs text-gray-400 dark:text-gray-300 mt-1">Créé le {{ $activity['created_at']->format('d/m/Y à H:i') }}</p>
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
        <div class="mb-8">
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="p-6">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2 dark:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                        </svg>
                        Document Size Analysis
                    </h4>
                    
                    <div class="flex flex-wrap gap-4 mb-6">
                        <div class="bg-blue-50 dark:bg-blue-900/30 px-4 py-3 rounded-lg flex-1 min-w-[200px]">
                            <p class="text-sm text-gray-600 dark:text-gray-300">Total Size</p>
                            <p class="text-xl font-semibold text-gray-800 dark:text-white">{{ $totalSizeGb }} GB</p>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/30 px-4 py-3 rounded-lg flex-1 min-w-[200px]">
                            <p class="text-sm text-gray-600 dark:text-gray-300">Average Size</p>
                            <p class="text-xl font-semibold text-gray-800 dark:text-white">{{ number_format($documentData->avg('size_mb'), 2) }} MB</p>
                        </div>
                        {{-- <div class="bg-purple-50 dark:bg-purple-900/30 px-4 py-3 rounded-lg flex-1 min-w-[200px]">
                            <p class="text-sm text-gray-600 dark:text-gray-300">Largest Document</p>
                            <p class="text-xl font-semibold text-gray-800 dark:text-white">{{ $largestDocumentSize }} MB</p>
                        </div> --}}
                    </div>
                    
                    <div class="h-80 dark:bg-gray-800/50 rounded-xl p-4 border border-gray-100 dark:border-gray-700">
                        <canvas id="documentSizeChart" class="w-full h-full"></canvas>
                    </div>
                    
                    <div class="flex justify-center mt-4 space-x-2">
                        <button onclick="changeChartType('line')" class="px-3 py-1 text-sm font-medium rounded-lg bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300">
                            Line Chart
                        </button>
                        <button onclick="changeChartType('bar')" class="px-3 py-1 text-sm font-medium rounded-lg bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                            Bar Chart
                        </button>
                        <button onclick="changeChartType('pie')" class="px-3 py-1 text-sm font-medium rounded-lg bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-300">
                            Pie Chart
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const ctx = document.getElementById('documentSizeChart').getContext('2d');
                const documentTitles = @json($documentData->pluck('titre'));
                const documentSizesMB = @json($documentData->pluck('size_mb'));
                
                const backgroundColors = documentTitles.map((_, i) => 
                    `hsl(${(i * 360 / documentTitles.length)}, 70%, 70%)`
                );
                const borderColors = documentTitles.map((_, i) => 
                    `hsl(${(i * 360 / documentTitles.length)}, 70%, 50%)`
                );
                
                window.documentSizeChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: documentTitles,
                        datasets: [{
                            label: 'Document Size (MB)',
                            data: documentSizesMB,
                            backgroundColor: backgroundColors,
                            borderColor: borderColors,
                            borderWidth: 2,
                            fill: true,
                            tension: 0.3,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: {
                                    color: '#6B7280',
                                    font: {
                                        size: 12
                                    }
                                }
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                                callbacks: {
                                    label: function(context) {
                                        return context.dataset.label + ': ' + context.raw + ' MB';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: '#6B7280'
                                },
                                grid: {
                                    color: 'rgba(229, 231, 235, 0.5)'
                                }
                            },
                            x: {
                                ticks: {
                                    color: '#6B7280',
                                    maxRotation: 45,
                                    minRotation: 45
                                },
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
                
                // Dark mode support
                const observer = new MutationObserver(() => {
                    const isDark = document.documentElement.classList.contains('dark');
                    const textColor = isDark ? '#E5E7EB' : '#374151';
                    const gridColor = isDark ? 'rgba(55, 65, 81, 0.5)' : 'rgba(229, 231, 235, 0.5)';
                    
                    window.documentSizeChart.options.scales.x.ticks.color = textColor;
                    window.documentSizeChart.options.scales.y.ticks.color = textColor;
                    window.documentSizeChart.options.scales.y.grid.color = gridColor;
                    window.documentSizeChart.options.plugins.legend.labels.color = textColor;
                    window.documentSizeChart.update();
                });
                
                observer.observe(document.documentElement, {
                    attributes: true,
                    attributeFilter: ['class']
                });
            });
            
            function changeChartType(type) {
                window.documentSizeChart.config.type = type;
                window.documentSizeChart.update();
            }
        </script>
    </div>
@endsection