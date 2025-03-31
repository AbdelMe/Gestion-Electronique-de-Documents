@extends('layouts.app')

@section('title', 'Modifier Document')

@section('content')
    <livewire:edit-document :document="$document" :typeDocuments="$typeDocuments" :dossiers="$dossiers" />
@endsection
