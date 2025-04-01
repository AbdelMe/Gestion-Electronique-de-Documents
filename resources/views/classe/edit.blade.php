@extends('layouts.app')

@section('title','Modifier Classe')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Modifier Classe</h2>

        <form action={{ route('classe.update',$classe->id) }} method="POST">
            @csrf
            @method('PUT')

            <div class="row">


                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="classe">Classe</label>
                        <input type="text" class="form-control @error('classe') is-invalid @enderror text-white" id="classe" name="classe" value="{{ $classe->classe }}" placeholder="Entrez le nom du classe">
                        @error('classe')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Mettre à jour</button>
                <a href="" class="btn btn-primary">Annuler</a>
            </div>
        </form>
    </div>
@endsection