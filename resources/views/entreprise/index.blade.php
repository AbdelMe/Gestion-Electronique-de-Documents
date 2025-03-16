@extends('layouts.app')
@section('title')
Entreprise
@endsection
@section('content')
    <div class="container mt-4">
        <h2 class="mb-4 text-white">Liste des Entreprises</h2>
        <a href={{ route('entreprise.create') }} class="btn btn-success mb-3"><i class="bi bi-plus-lg"></i> Ajouter Entreprise</a>
        <table class="table table-bordered table-striped text-white">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Raison Sociale</th>
                    <th>Nom Client</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Fax</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entreprises as $entreprise)
                    <tr>
                        <td>{{$entreprise->id}}</td>
                        <td>{{$entreprise->RaisonSocial}}</td>
                        <td>{{$entreprise->NomClient}}</td>
                        <td>{{$entreprise->Adresse}}</td>
                        <td>{{$entreprise->Ville}}</td>
                        <td>{{$entreprise->Tel}}</td>
                        <td>{{$entreprise->Email}}</td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-2">
                                <a href="" class="btn btn-info btn-sm px-2 py-1 mx-1">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a href="" class="btn btn-warning btn-sm px-2 py-1 mx-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-sm px-2 py-1 mx-1">
                                    <i class="bi bi-trash3-fill"></i>
                                </a>
                            </div>
                        </td>
                        
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>{{$entreprises->links()}}</p>
    </div>
@endsection
