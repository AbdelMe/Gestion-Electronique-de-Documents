@extends('layouts.app')

@section('title', 'Documentation - GED')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-5xl">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white">Guide d'utilisation - Système GED</h1>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-teal-600 mb-2">Introduction</h2>
        <p class="text-gray-700 dark:text-gray-300">
            Ce guide a pour objectif de vous aider à utiliser efficacement le système de Gestion Électronique des Documents (GED).
            Ce système vous permet de stocker, organiser, rechercher et gérer des documents de manière sécurisée et centralisée.
        </p>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-teal-600 mb-2">Fonctionnalités Principales</h2>
        <ul class="list-disc list-inside text-gray-700 dark:text-gray-300">
            <li>Ajout et organisation des documents par rubrique</li>
            <li>Recherche rapide par mot-clé ou filtre</li>
            <li>Gestion des utilisateurs et des rôles</li>
            <li>Historique des modifications</li>
            <li>Téléchargement et prévisualisation des documents</li>
        </ul>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-teal-600 mb-2">Comment Utiliser le Système</h2>
        <div class="space-y-4 text-gray-700 dark:text-gray-300">
            <p><strong>1. Connexion :</strong> Connectez-vous avec votre identifiant et mot de passe.</p>
            <p><strong>2. Ajouter un document :</strong> Accédez à "Documents", cliquez sur "Ajouter" et remplissez le formulaire.</p>
            <p><strong>3. Rechercher :</strong> Utilisez la barre de recherche pour trouver un document spécifique.</p>
            <p><strong>4. Gérer les rubriques :</strong> Naviguez vers "Rubriques" pour créer ou modifier les catégories de classement.</p>
            <p><strong>5. Gérer les utilisateurs :</strong> Les administrateurs peuvent ajouter des utilisateurs et définir leurs permissions.</p>
        </div>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-teal-600 mb-2">Questions Fréquemment Posées (FAQ)</h2>
        <div class="space-y-4 text-gray-700 dark:text-gray-300">
            <div>
                <strong>Q: Puis-je modifier un document après l'avoir ajouté ?</strong>
                <p>R: Oui, cliquez sur "Modifier" dans la liste des documents.</p>
            </div>
            <div>
                <strong>Q: Qui peut voir mes documents ?</strong>
                <p>R: Cela dépend des permissions assignées à votre rôle.</p>
            </div>
            <div>
                <strong>Q: Y a-t-il une limite de taille pour les fichiers ?</strong>
                <p>R: Oui, la taille maximale est définie par l'administrateur système.</p>
            </div>
        </div>
    </section>

    <section class="mb-8">
        <h2 class="text-xl font-semibold text-teal-600 mb-2">Support & Contact</h2>
        <p class="text-gray-700 dark:text-gray-300">
            Si vous avez besoin d’aide supplémentaire, veuillez nous contacter via la page <a href="{{ route('contact') }}" class="text-indigo-600 underline">Contact</a>
            ou envoyez un email à <a href="mailto:support@archivi.com" class="text-indigo-600 underline">support@archivi.com</a>
        </p>
    </section>
</div>
@endsection
