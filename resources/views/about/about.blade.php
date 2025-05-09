@extends('layouts.app')

@section('title', 'À propos de GED')

@section('content')
<div class="max-w-7xl mx-auto py-16 px-6 space-y-16 text-gray-800 dark:text-gray-200 dark:from-gray-900 dark:to-gray-800">
    <div class="text-center space-y-4 animate-fade-in">
        <h1 class="text-5xl font-extrabold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400">À propos du système GED</h1>
        <p class="text-xl max-w-3xl mx-auto leading-relaxed">Un système moderne de gestion électronique de documents conçu pour simplifier le travail, sécuriser les données et optimiser l'accès aux fichiers essentiels.</p>
    </div>

    <div class="flex justify-center relative group">
        <img src="{{ asset('images/ged_dashboard_sample.png') }}" alt="Aperçu du tableau de bord GED" class="rounded-2xl shadow-xl w-full max-w-5xl transform transition-all duration-500">
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
    </div>

    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div class="space-y-6 animate-slide-up">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Fonctionnalités clés</h2>
            <ul class="space-y-4 text-lg">
                <li class="flex items-center space-x-3 group">
                    <span class="group-hover:text-blue-600 dark:group-hover:text-blue-300 transition-colors duration-300">Accès sécurisé selon les rôles utilisateurs</span>
                </li>
                <li class="flex items-center space-x-3 group">
                    <span class="group-hover:text-blue-600 dark:group-hover:text-blue-300 transition-colors duration-300">Classement des documents par catégories & versions</span>
                </li>
                <li class="flex items-center space-x-3 group">
                    <span class="group-hover:text-blue-600 dark:group-hover:text-blue-300 transition-colors duration-300">Suivi des modifications et archivage automatique</span>
                </li>
                <li class="flex items-center space-x-3 group">
                    <span class="group-hover:text-blue-600 dark:group-hover:text-blue-300 transition-colors duration-300">Système d’état : Brouillon, En attente, Approuvé, Rejeté</span>
                </li>
                <li class="flex items-center space-x-3 group">
                    <span class="group-hover:text-blue-600 dark:group-hover:text-blue-300 transition-colors duration-300">Téléversement simple de fichiers et recherche rapide</span>
                </li>
                <li class="flex items-center space-x-3 group">
                    <span class="group-hover:text-blue-600 dark:group-hover:text-blue-300 transition-colors duration-300">Notifications automatiques lors des changements importants</span>
                </li>
            </ul>
        </div>
        <div class="relative">
            <img src="{{ asset('assets\images\doc3-removebg-preview.png') }}" alt="Diagramme de processus GED" class="w-full transform transition-transform duration-700 hover:-translate-y-2">
        </div>
    </div>

    <div class="space-y-8 animate-fade-in">
        <h2 class="text-3xl font-bold text-gray-900 dark:text-white text-center">Captures d’écran</h2>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="relative group">
                <img src="{{ asset('images/ged_upload.png') }}" class="rounded-xl shadow-md w-full transform transition-all duration-500 group-hover:scale-105" alt="Upload de document">
                <div class="absolute inset-0 bg-blue-500/10 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
            <div class="relative group">
                <img src="{{ asset('images/ged_etat_flow.png') }}" class="rounded-xl shadow-md w-full transform transition-all duration-500 group-hover:scale-105" alt="État Workflow du document">
                <div class="absolute inset-0 bg-blue-500/10 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
            <div class="relative group">
                <img src="{{ asset('images/ged_versions.png') }}" class="rounded-xl shadow-md w-full transform transition-all duration-500 group-hover:scale-105" alt="Gestion des Versions">
                <div class="absolute inset-0 bg-blue-500/10 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
        </div>
    </div>

    {{-- <div class="text-center pt-12 animate-slide-up">
        <p class="text-base text-gray-600 dark:text-gray-400">
            Projet développé par [Votre Nom] – {{ now()->year }}
        </p>
    </div> --}}
</div>


<style>
    .animate-fade-in {
        animation: fadeIn 1s ease-out;
    }
    .animate-slide-up {
        animation: slideUp 1s ease-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes slideUp {
        from { transform: translateY(20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        gsap.from('.animate-fade-in h1', {
            y: -50,
            opacity: 0,
            duration: 1.2,
            ease: 'power3.out'
        });
        gsap.from('.animate-fade-in p', {
            y: 50,
            opacity: 0,
            duration: 1.2,
            delay: 0.3,
            ease: 'power3.out'
        });

        gsap.from('.animate-slide-up li', {
            x: -30,
            opacity: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: 'power2.out'
        });

        gsap.from('.animate-fade-in .group', {
            y: 30,
            opacity: 0,
            duration: 1,
            stagger: 0.2,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: '.animate-fade-in',
                start: 'top 80%'
            }
        });
    });
</script>
@endsection