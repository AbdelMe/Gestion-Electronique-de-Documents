@extends('layouts.app')

@section('title', 'Document Versions - ' . $document->title)

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header text-light" style="background: linear-gradient(90deg, #131d27 0%, #496683 100%)">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="bi bi-clock-history me-2"></i>
                            Versions pour : {{ $document->title }}
                        </h5>
                        <a href="{{ route('documents.show', $document->id) }}" class="btn btn-sm btn-light">
                            <i class="bi bi-arrow-left me-1"></i> Retour au document
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if($versions->count() > 0)
                        <div class="table-responsive">
                            <table class="table text-light">
                                <thead style="background: linear-gradient(90deg, #131d27 0%, #496683 100%)">
                                    <tr>
                                        <th>Version #</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($versions as $version)
                                    <tr style="background: linear-gradient(90deg, #496683 0%, #131d27 100%)">
                                        <td class="fw-bold">Version {{ $version->numero }}</td>
                                        <td>{{ $version->date->format('M d, Y H:i') }}</td>
                                        <td>
                                            @if($version->description)
                                                {{ $version->description }}
                                            @else
                                                <span class="text-muted">Aucune description</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="d-inline-flex gap-2">
                                                <a href="{{ route('versions.show', [$document->id, $version->id]) }}" 
                                                   class="btn text-white"
                                                   title="Voir cette version">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                                @if(auth()->user()->can('update', $document))
                                                <a href="{{ route('versions.edit', [$document->id, $version->id]) }}" 
                                                   class="btn text-white"
                                                   title="Modifier cette version">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="text-muted">
                                Affichage de {{ $versions->count() }} version(s)
                            </div>
                            @if($versions instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            <div class="d-flex justify-content-end">
                                {{ $versions->links() }}
                            </div>
                            @endif
                        </div>
                    @else
                        <div class="alert alert-info text-center py-4">
                            <i class="bi bi-info-circle-fill fs-2 mb-3"></i>
                            <h5>Aucune version disponible pour ce document</h5>
                            <p class="mb-0">Ajoutez une première version pour commencer.</p>
                        </div>
                    @endif
                </div>

                @can('create', App\Models\Version::class)
                <div class="card-footer bg-light d-flex justify-content-end">
                    <a href="{{ route('versions.create', $document->id) }}" class="btn btn-success">
                        <i class="bi bi-plus-lg me-2"></i> Nouvelle Version
                    </a>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .table-hover tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.05);
    }
    .table thead th {
        border: none;
    }
    .table td, .table th {
        vertical-align: middle;
    }
</style>
@endsection
