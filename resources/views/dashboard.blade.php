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
    <div class="container mx-auto px-4 py-8 pb-0">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">@lang('dashboard.title')</h1>
            <div class="text-sm text-gray-500">
                {{ \Carbon\Carbon::now()->locale(app()->getLocale())->isoFormat('dddd, MMMM D, YYYY') }}
            </div>
        </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300 dark:border-gray-800 dark:bg-white/[0.03]">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 mb-1 dark:text-white">@lang('dashboard.all_users')</p>
                                    <div class="flex items-end gap-2">
                                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white">{{ count($users ?? []) }}</h3>
                                        {{-- <span class="text-sm font-medium px-2 py-0.5 rounded-full {{ $usersChanges > 0 ? 'bg-green-100 text-green-800' : ($usersChanges < 0 ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ $usersChanges > 0 ? "↑ +$usersChanges" : ($usersChanges < 0 ? "↓ $usersChanges" : "→ Stable") }}
                                        </span> --}}
                                    </div>
                                </div>
                                <div class="p-3 rounded-lg text-blue-600">
                                    <i class="bi bi-building text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center dark:border-gray-800">
                                <p class="text-sm text-gray-500 dark:text-white">@lang('dashboard.since_last_month')</p>
                                <a href="{{ route('users.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 flex items-center gap-1">
                                    @lang('dashboard.view_all')<i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
        
                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300 dark:border-gray-800 dark:bg-white/[0.03]">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 mb-1 dark:text-white">@lang('dashboard.all_dossiers')</p>
                                    <div class="flex items-end gap-2">
                                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white">{{ count($dossiers ?? []) }}</h3>
                                        {{-- <span class="text-sm font-medium px-2 py-0.5 rounded-full {{ $dossiersChange > 0 ? 'bg-green-100 text-green-800' : ($dossiersChange < 0 ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ $dossiersChange > 0 ? "↑ +$dossiersChange" : ($dossiersChange < 0 ? "↓ $dossiersChange" : "→ Stable") }}
                                        </span> --}}
                                    </div>
                                </div>
                                <div class="p-3 rounded-lg text-indigo-600">
                                    <i class="bi bi-folder text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center dark:border-gray-800">
                                <p class="text-sm text-gray-500 dark:text-white">@lang('dashboard.since_last_month')</p>
                                <a href="{{ route('dossiers.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800 flex items-center gap-1">
                                    @lang('dashboard.view_all') <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
        
                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300 dark:border-gray-800 dark:bg-white/[0.03]">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm font-medium text-gray-500 mb-1 dark:text-white">@lang('dashboard.all_documents')</p>
                                    <div class="flex items-end gap-2">
                                        <h3 class="text-3xl font-bold text-gray-800 dark:text-white">{{ count($documents ?? []) }}</h3>
                                        {{-- <span class="text-sm font-medium px-2 py-0.5 rounded-full {{ $documentsChange > 0 ? 'bg-green-100 text-green-800' : ($documentsChange < 0 ? 'bg-red-100 text-red-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ $documentsChange > 0 ? "↑ +$documentsChange" : ($documentsChange < 0 ? "↓ $documentsChange" : "→ Stable") }}
                                        </span> --}}
                                    </div>
                                </div>
                                <div class="p-3 rounded-lg text-emerald-600">
                                    <i class="bi bi-file-earmark text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-t border-gray-100 flex justify-between items-center dark:border-gray-800">
                                <p class="text-sm text-gray-500 dark:text-white">@lang('dashboard.since_last_month')</p>
                                <a href="{{ route('documents.index') }}" class="text-sm font-medium text-emerald-600 hover:text-emerald-800 flex items-center gap-1">
                                    @lang('dashboard.view_all') <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        
        <div class="mb-10">
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100 dark:border-gray-800 dark:bg-white/[0.03]">
                <h4 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2 dark:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                    </svg>
                    @lang('dashboard.action')
                </h4>
        
                @php
                $buttons = [
                    ['route' => 'users.AddUser', 'color' => 'gray', 'icon' => 'bi-person', 'label' => 'user'],
                    // ['route' => 'classe.create', 'color' => 'blue', 'icon' => 'bi-collection', 'label' => 'Créer Classe'],
                    ['route' => 'dossiers.create', 'color' => 'indigo', 'icon' => 'bi-folder', 'label' => 'dossier'],
                    ['route' => 'documents.create', 'color' => 'emerald', 'icon' => 'bi-file-earmark', 'label' => 'document'],
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
                                @lang('dashboard.' . $btn['label'])
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        
<div class="mb-8">
  <div
    class="bg-white rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 dark:bg-gray-900 overflow-hidden"
  >
    <div class="p-8">
      <h4
        class="text-2xl font-semibold text-gray-900 mb-6 flex items-center gap-3 dark:text-gray-100"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-6 w-6 text-blue-600 flex-shrink-0"
          viewBox="0 0 20 20"
          fill="currentColor"
          aria-hidden="true"
        >
          <path
            fill-rule="evenodd"
            d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
            clip-rule="evenodd"
          />
        </svg>
        @lang('dashboard.document_size_analysis')
      </h4>

      <div class="flex flex-wrap gap-6 mb-8">
        <div
          class="flex-1 min-w-[220px] bg-blue-50 dark:bg-blue-900/20 rounded-lg p-5 shadow-inner"
        >
          <p class="text-sm text-blue-700 dark:text-blue-300 font-medium">
            @lang('dashboard.total_size')
          </p>
          <p
            class="mt-1 text-3xl font-extrabold text-blue-900 dark:text-blue-400"
          >
            {{ $totalSizeGb }} GB
          </p>
        </div>

        <div
          class="flex-1 min-w-[220px] bg-green-50 dark:bg-green-900/20 rounded-lg p-5 shadow-inner"
        >
          <p class="text-sm text-green-700 dark:text-green-300 font-medium">
            @lang('dashboard.average_size')
          </p>
          <p
            class="mt-1 text-3xl font-extrabold text-green-900 dark:text-green-400"
          >
            {{ number_format($documentData->avg('size_mb'), 2) }} MB
          </p>
        </div>
      </div>

      <div
        class="relative h-96 rounded-2xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 p-6"
      >
        <canvas id="documentSizeChart" class="w-full h-full"></canvas>
      </div>

      <div
        class="flex justify-center gap-4 mt-6"
      >
        <button
          onclick="changeChartType('line')"
          class="px-5 py-2 text-sm font-semibold rounded-full bg-blue-600 text-white shadow hover:bg-blue-700 transition"
          aria-label="@lang('dashboard.line_chart')"
          type="button"
        >
          @lang('dashboard.line_chart')
        </button>
        <button
          onclick="changeChartType('bar')"
          class="px-5 py-2 text-sm font-semibold rounded-full bg-gray-300 dark:bg-gray-700 text-gray-800 dark:text-gray-200 shadow hover:bg-gray-400 dark:hover:bg-gray-600 transition"
          aria-label="@lang('dashboard.bar_chart')"
          type="button"
        >
          @lang('dashboard.bar_chart')
        </button>
        <button
          onclick="changeChartType('pie')"
          class="px-5 py-2 text-sm font-semibold rounded-full bg-purple-600 text-white shadow hover:bg-purple-700 transition"
          aria-label="@lang('dashboard.pie_chart')"
          type="button"
        >
          @lang('dashboard.pie_chart')
        </button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("documentSizeChart").getContext("2d");
    const documentTypes = @json($documentTypes);
    const storageSizes = @json($storageSizes);

    const backgroundColors = documentTypes.map(
      (_, i) => `hsl(${(i * 360) / documentTypes.length}, 70%, 70%)`
    );
    const borderColors = documentTypes.map(
      (_, i) => `hsl(${(i * 360) / documentTypes.length}, 70%, 50%)`
    );

    function createLineChart(ctx, labels, data, bgColors, borderColors) {
      // Create gradient fill for line chart background
      const gradient = ctx.createLinearGradient(0, 0, 0, 300);
      gradient.addColorStop(0, 'rgba(59, 130, 246, 0.5)');   // blue-500 with opacity
      gradient.addColorStop(1, 'rgba(59, 130, 246, 0)');     // transparent

      return new Chart(ctx, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
            label: 'Storage by Document Type (MB)',
            data: data,
            fill: true,
            backgroundColor: gradient,
            borderColor: borderColors[0] || '#3b82f6',
            borderWidth: 3,
            tension: 0.4,
            pointRadius: 6,
            pointHoverRadius: 8,
            pointBackgroundColor: borderColors,
            pointBorderColor: '#fff',
            pointBorderWidth: 2,
            hoverBackgroundColor: '#fff',
            hoverBorderColor: borderColors,
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
                font: { size: 14, weight: '600' },
              }
            },
            tooltip: {
              mode: 'nearest',
              intersect: false,
              backgroundColor: '#111827cc',
              titleColor: '#f9fafb',
              bodyColor: '#f9fafb',
              borderColor: borderColors[0] || '#3b82f6',
              borderWidth: 1,
              padding: 10,
              cornerRadius: 6,
              callbacks: {
                label: ctx => `${ctx.dataset.label}: ${ctx.parsed.y} MB`
              }
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                color: '#6B7280',
                font: { weight: '600' },
              },
              grid: {
                color: 'rgba(229, 231, 235, 0.6)',
                borderDash: [5, 5],
              }
            },
            x: {
              ticks: {
                color: '#6B7280',
                maxRotation: 45,
                minRotation: 45,
                font: { weight: '600' },
              },
              grid: {
                display: false,
              }
            }
          }
        }
      });
    }

    function createBarChart(ctx, labels, data, bgColors, borderColors) {
      return new Chart(ctx, {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            label: 'Storage by Document Type (MB)',
            data: data,
            backgroundColor: bgColors,
            borderColor: borderColors,
            borderWidth: 1,
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
                font: { size: 14, weight: '600' },
              }
            },
            tooltip: {
              callbacks: {
                label: ctx => `${ctx.label}: ${ctx.raw} MB`,
              }
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                color: '#6B7280',
                font: { weight: '600' },
              },
              grid: {
                color: 'rgba(229, 231, 235, 0.6)',
                borderDash: [5, 5],
              }
            },
            x: {
              ticks: {
                color: '#6B7280',
                maxRotation: 45,
                minRotation: 45,
                font: { weight: '600' },
              },
              grid: {
                display: false,
              }
            }
          }
        }
      });
    }

    function createPieChart(ctx, labels, data, bgColors, borderColors) {
      return new Chart(ctx, {
        type: 'pie',
        data: {
          labels: labels,
          datasets: [{
            label: 'Storage by Document Type (MB)',
            data: data,
            backgroundColor: bgColors,
            borderColor: borderColors,
            borderWidth: 1,
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              position: 'right',
              labels: {
                color: '#6B7280',
                font: { size: 14, weight: '600' },
              }
            },
            tooltip: {
              callbacks: {
                label: ctx => `${ctx.label}: ${ctx.raw} MB`,
              }
            }
          }
        }
      });
    }

    // Initialize with line chart
    window.documentSizeChart = createLineChart(ctx, documentTypes, storageSizes, backgroundColors, borderColors);

    // Dark mode support
    const observer = new MutationObserver(() => {
      const isDark = document.documentElement.classList.contains('dark');
      const textColor = isDark ? '#D1D5DB' : '#374151';
      const gridColor = isDark ? 'rgba(55, 65, 81, 0.5)' : 'rgba(229, 231, 235, 0.6)';

      if (!window.documentSizeChart) return;

      const opts = window.documentSizeChart.options;

      opts.scales.x.ticks.color = textColor;
      opts.scales.y.ticks.color = textColor;
      if (opts.scales.y.grid) opts.scales.y.grid.color = gridColor;
      if (opts.plugins.legend.labels) opts.plugins.legend.labels.color = textColor;

      window.documentSizeChart.update();
    });

    observer.observe(document.documentElement, {
      attributes: true,
      attributeFilter: ['class'],
    });

    window.changeChartType = function (type) {
      if (window.documentSizeChart) {
        window.documentSizeChart.destroy();
      }

      if (type === 'line') {
        window.documentSizeChart = createLineChart(ctx, documentTypes, storageSizes, backgroundColors, borderColors);
      } else if (type === 'bar') {
        window.documentSizeChart = createBarChart(ctx, documentTypes, storageSizes, backgroundColors, borderColors);
      } else if (type === 'pie') {
        window.documentSizeChart = createPieChart(ctx, documentTypes, storageSizes, backgroundColors, borderColors);
      }
    };
  });
</script>





        <div class="mb-8">
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="p-6">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2 dark:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                        @lang('dashboard.recent_activities')
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
                                            @lang('dashboard.new_document')
                                            @endif
                                        </p>
                                        <p class="text-sm text-gray-500 dark:text-gray-300">{{ $activity['name'] }}</p>
                                        <p class="text-xs text-gray-400 dark:text-gray-300 mt-1">@lang('dashboard.created_on') {{ $activity['created_at']->format('d/m/Y - H:i') }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    @if ($activity['is_new'])
                                        <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">@lang('dashboard.new')</span>
                                    @endif
                                    <a href="{{ route('documents.show', $activity['id']) }}" class="bg-gray-300 text-blue-800 text-xs px-2 py-1 rounded-full">
                                        <i class="bi bi-eye"></i> @lang('dashboard.view')
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    @if(count($recentActivities) > 3)
                        <div class="mt-4 text-center">
                            <a href="{{ route('documents.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 inline-flex items-center">
                                @lang('dashboard.view_all_documents') <i class="bi bi-chevron-down ml-1"></i>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div>
            <x-footer/>
        </div>

    </div>
@endsection