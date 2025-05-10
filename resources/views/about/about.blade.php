@extends('layouts.app')

@section('title', 'À propos de GED')

@section('content')
<div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8 space-y-20 text-gray-800 dark:text-gray-200">
    <div class="text-center space-y-6">
        <div class="animate-fade-in-down">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400">
                À propos du système GED
            </h1>
            <p class="mt-6 text-lg sm:text-xl max-w-3xl mx-auto leading-relaxed text-gray-600 dark:text-gray-300">
                Un système moderne de gestion électronique de documents conçu pour simplifier le travail, sécuriser les données et optimiser l'accès aux fichiers essentiels.
            </p>
        </div>
    </div>

    <div class="flex justify-center relative group animate-float">
        <div class="absolute -inset-4 bg-gradient-to-r from-blue-500/20 to-indigo-500/20 rounded-3xl blur-lg opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <img src="{{ asset('assets\images\Screenshot 2025-05-10 223620.png') }}" alt="Aperçu du tableau de bord GED" 
             class="relative rounded-2xl shadow-2xl w-full max-w-5xl border border-gray-200 dark:border-gray-700 transform transition-all duration-500 group-hover:-translate-y-2 group-hover:shadow-xl">
    </div>

    <div class="grid md:grid-cols-2 gap-12 items-center">
        <div class="space-y-8 animate-slide-left">
            <div>
                <span class="inline-block mb-2 text-sm font-semibold text-blue-600 dark:text-blue-400">FONCTIONNALITÉS</span>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Optimisez votre gestion documentaire</h2>
            </div>
            
            <ul class="space-y-5">
                <li class="flex items-start space-x-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-all duration-300 group">
                    <div class="flex-shrink-0 mt-1">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Accès sécurisé</h3>
                        <p class="mt-1 text-gray-600 dark:text-gray-400">Contrôle des accès basé sur les rôles utilisateurs avec authentification forte</p>
                    </div>
                </li>
                
                <li class="flex items-start space-x-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-all duration-300 group">
                    <div class="flex-shrink-0 mt-1">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                                <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Classement intelligent</h3>
                        <p class="mt-1 text-gray-600 dark:text-gray-400">Organisation des documents par catégories, tags et gestion des versions</p>
                    </div>
                </li>
                
                <li class="flex items-start space-x-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-all duration-300 group">
                    <div class="flex-shrink-0 mt-1">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Workflow automatisé</h3>
                        <p class="mt-1 text-gray-600 dark:text-gray-400">Suivi des modifications, archivage et gestion des états (Brouillon, En attente, Approuvé)</p>
                    </div>
                </li>
                
                <li class="flex items-start space-x-4 p-4 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-all duration-300 group">
                    <div class="flex-shrink-0 mt-1">
                        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/50 text-blue-600 dark:text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Notifications</h3>
                        <p class="mt-1 text-gray-600 dark:text-gray-400">Alertes en temps réel pour les changements importants et actions requises</p>
                    </div>
                </li>
            </ul>
        </div>
        
        <div class="relative animate-slide-right">
            <div class="absolute -top-8 -left-8 w-32 h-32 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob"></div>
            <div class="absolute -bottom-8 -right-8 w-32 h-32 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-2000"></div>
            <div class="absolute top-20 -right-4 w-32 h-32 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-4000"></div>
            
            <img src="{{ asset('assets/images/doc3-removebg-preview.png') }}" alt="Diagramme de processus GED" 
                 class="relative w-full max-w-lg mx-auto transform transition-transform duration-700 hover:scale-105">
        </div>
    </div>

    <div class="space-y-12 animate-fade-in">
        <div class="text-center">
            <span class="inline-block mb-2 text-sm font-semibold text-blue-600 dark:text-blue-400">VISUELS</span>
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Explorez l'interface GED</h2>
            <p class="mt-3 max-w-2xl mx-auto text-gray-600 dark:text-gray-400">
                Découvrez les principales fonctionnalités à travers ces captures d'écran
            </p>
        </div>
        
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="relative group overflow-hidden rounded-2xl shadow-lg transition-all duration-500 hover:shadow-xl">
                <img src="{{ asset('assets/images/doc3-removebg-preview.png') }}"
                     class="w-full h-64 object-cover transform transition-transform duration-700 group-hover:scale-110" 
                     alt="Upload de document">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-6">
                    <div class="translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <h3 class="text-xl font-bold text-white">Téléversement simplifié</h3>
                        <p class="mt-1 text-gray-200 opacity-0 group-hover:opacity-100 transition-opacity duration-700">Drag & drop ou sélection de fichiers</p>
                    </div>
                </div>
            </div>
            
            <div class="relative group overflow-hidden rounded-2xl shadow-lg transition-all duration-500 hover:shadow-xl">
                <img src="{{ asset('assets/images/doc3-removebg-preview.png') }}"
                     class="w-full h-64 object-cover transform transition-transform duration-700 group-hover:scale-110" 
                     alt="État Workflow du document">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-6">
                    <div class="translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <h3 class="text-xl font-bold text-white">Workflow visuel</h3>
                        <p class="mt-1 text-gray-200 opacity-0 group-hover:opacity-100 transition-opacity duration-700">Suivez l'état de vos documents en un coup d'œil</p>
                    </div>
                </div>
            </div>
            
            <div class="relative group overflow-hidden rounded-2xl shadow-lg transition-all duration-500 hover:shadow-xl">
                <img src="{{ asset('assets/images/doc3-removebg-preview.png') }}"
                     class="w-full h-64 object-cover transform transition-transform duration-700 group-hover:scale-110" 
                     alt="Gestion des Versions">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-6">
                    <div class="translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                        <h3 class="text-xl font-bold text-white">Historique des versions</h3>
                        <p class="mt-1 text-gray-200 opacity-0 group-hover:opacity-100 transition-opacity duration-700">Accédez à toutes les versions précédentes</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gradient-to-t from-indigo-700 to-gray-900 rounded-3xl p-8 sm:p-12 shadow-xl animate-fade-in-up">
        <div class="max-w-7xl mx-auto">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                    GED en chiffres
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-blue-100 sm:mt-4">
                    Quelques statistiques sur l'impact de notre solution
                </p>
            </div>
            
            <div class="mt-10 grid grid-cols-2 gap-8 md:grid-cols-4">
                <div class="text-center">
                    <dt class="text-4xl font-extrabold text-white">99.9%</dt>
                    <dd class="mt-2 text-blue-200">Disponibilité</dd>
                </div>
                
                <div class="text-center">
                    <dt class="text-4xl font-extrabold text-white">10x</dt>
                    <dd class="mt-2 text-blue-200">Gain de productivité</dd>
                </div>
                
                <div class="text-center">
                    <dt class="text-4xl font-extrabold text-white">24/7</dt>
                    <dd class="mt-2 text-blue-200">Accès sécurisé</dd>
                </div>
                
                <div class="text-center">
                    <dt class="text-4xl font-extrabold text-white">100%</dt>
                    <dd class="mt-2 text-blue-200">Satisfaction client</dd>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .animate-fade-in-down {
        animation: fadeInDown 1s ease-out;
    }
    .animate-slide-left {
        animation: slideInLeft 1s ease-out;
    }
    .animate-slide-right {
        animation: slideInRight 1s ease-out;
    }
    .animate-fade-in-up {
        animation: fadeInUp 1s ease-out;
    }
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
    
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes slideInLeft {
        from { opacity: 0; transform: translateX(-30px) translateY(20px); }
        50% { opacity: 0.5; transform: translateX(-15px) translateY(10px); }
        to { opacity: 1; transform: translateX(0) translateY(0); }
    }
    @keyframes slideInRight {
        from { opacity: 0; transform: translateX(30px) translateY(20px); }
        50% { opacity: 0.5; transform: translateX(15px) translateY(10px); }
        to { opacity: 1; transform: translateX(0) translateY(0); }
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px) translateX(10px); }
        50% { opacity: 0.5; transform: translateY(10px) translateX(5px); }
        to { opacity: 1; transform: translateY(0) translateX(0); }
    }
    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-10px) rotate(2deg); }
    }
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1) rotate(0deg); }
        33% { transform: translate(30px, -50px) scale(1.1) rotate(5deg); }
        66% { transform: translate(-20px, 20px) scale(0.9) rotate(-5deg); }
        100% { transform: translate(0px, 0px) scale(1) rotate(0deg); }
    }

    .stagger-child > * {
        opacity: 0;
        transform: translateY(10px);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        gsap.registerPlugin(ScrollTrigger);
        
        gsap.to(".animate-slide-left li", {
            y: 0,
            opacity: 1,
            duration: 0.6,
            stagger: {
                each: 0.15,
                from: "start",
                ease: "back.out(1.7)"
            },
            scrollTrigger: {
                trigger: ".animate-slide-left",
                start: "top 80%"
            }
        });

        gsap.to(".animate-fade-in .group", {
            y: 0,
            opacity: 1,
            duration: 0.8,
            stagger: {
                each: 0.2,
                from: "start",
                ease: "back.out(1.7)"
            },
            scrollTrigger: {
                trigger: ".animate-fade-in",
                start: "top 75%"
            }
        });

        gsap.to(".animate-fade-in-up", {
            y: 0,
            opacity: 1,
            duration: 1,
            ease: "power2.out",
            scrollTrigger: {
                trigger: ".animate-fade-in-up",
                start: "top 80%"
            }
        });

        gsap.utils.toArray(".animate-fade-in-up dt").forEach((el, i) => {
            gsap.from(el, {
                textContent: 0,
                opacity: 0,
                y: 20,
                duration: 1.5,
                delay: i * 0.2,
                ease: "power1.out",
                snap: { textContent: 1 },
                scrollTrigger: {
                    trigger: el,
                    start: "top 80%"
                }
            });
        });

        gsap.utils.toArray(".stagger-child > *").forEach((el, i) => {
            gsap.to(el, {
                y: 0,
                opacity: 1,
                duration: 0.8,
                delay: i * 0.1,
                ease: "back.out(1.7)",
                scrollTrigger: {
                    trigger: el.parentElement,
                    start: "top 80%"
                }
            });
        });
    });
</script>
@endsection