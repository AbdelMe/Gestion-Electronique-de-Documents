@extends('layouts.app')

@section('title', 'Créer Document')

@section('content')
    <div class="container ">

        <div class="row">
            @livewire(name: 'display-rubriques')
        </div>
    </div>
@endsection
