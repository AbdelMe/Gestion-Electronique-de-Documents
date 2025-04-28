<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\RubriqueController;
use App\Http\Controllers\RubriqueDocumentController;
use App\Http\Controllers\TypeDocumentController;
use App\Http\Controllers\TypeRubriqueController;
use App\Http\Controllers\VersionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DroitController;
use App\Http\Controllers\DroitUserController;
use App\Http\Controllers\TypeUserController;
use App\Livewire\EditDocument;
use App\Models\Classe;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\Entreprise;
use App\Models\TypeUser;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('auth.login');
});

// Authentication Routes
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);

// Authenticated routes
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        $entreprises = Entreprise::all();
        $classe = Classe::all();
        $dossiers = Dossier::all();
        $documents = Document::all();

        //     Route::resource('/entreprise', EntrepriseController::class)->names('entreprise');
        // Route::resource('/dossiers', DossierController::class);
        // Route::resource('/documents', DocumentController::class);

        // Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
        // Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create');
        // Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
        // Route::get('/documents/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
        // Route::put('/documents/{document}', [DocumentController::class, 'update'])->name('documents.update');
        // Route::get('/documents/show/{document}', [DocumentController::class, 'show'])->name('documents.show');
        // Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
        // Route::get('/documents/{document}/edit', [EditDocument::class, 'render'])->name('render');

        $recentDocuments = Document::orderBy('created_at', 'desc')->take(5)->get();
        $recentActivities = [];

        foreach ($recentDocuments as $document) {
            $recentActivities[] = [
                'id' => $document->id,
                'type' => 'document',
                'name' => $document->LibelleDocument,
                'file_path' => $document->CheminDocument,
                'created_at' => $document->created_at,
                'is_new' => $document->created_at->isToday(),
            ];
        }

        usort($recentActivities, function ($a, $b) {
            return $b['created_at'] <=> $a['created_at'];
        });
        return view('dashboard', compact('entreprises', 'dossiers', 'documents', 'recentActivities'));
    })->name('dashboard');



    Route::resource('/entreprise', EntrepriseController::class)->names('entreprise');
    Route::resource('/dossiers', DossierController::class);
    // Route::resource('/services', ServiceController::class);
// Route::resource('/documents', DocumentController::class);

    Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('/documents/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
    Route::put('/documents/{document}', [DocumentController::class, 'update'])->name('documents.update');
    Route::get('/documents/show/{document}', [DocumentController::class, 'show'])->name('documents.show');
    Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');

    Route::get('/documents/SelectedType', [DocumentController::class, 'SelectedType'])->name('documents.SelectedType');

    Route::resource('/type_documents', TypeDocumentController::class);
    Route::resource('/rubrique', RubriqueController::class);


    Route::resource('/type_rubrique', TypeRubriqueController::class);
    
    Route::resource('/rubrique_document', RubriqueDocumentController::class);
    
    Route::resource('/roles', TypeUserController::class);
    Route::resource('/permitions', DroitController::class);

    // Route::get('/login', function () {
//     return view('Login&Register.index');
// });

    // Route::resource('/documents/{document}', [DocumentController::class , 'download']);
    Route::get('/documents/download/{document}', [DocumentController::class, 'download'])
        ->name('documents.download');


    Route::resource('/versions', VersionController::class);
    Route::resource('/classe', ClasseController::class);

    Route::get('/documents/{document}/versions', [DocumentController::class, 'versions'])
     ->name('documents.versions');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    
    
    Route::get('/users', [AuthController::class, 'index'])->name('users.index');




});
