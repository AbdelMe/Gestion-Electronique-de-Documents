<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\RubriqueController;
use App\Http\Controllers\RubriqueDocumentController;
<<<<<<< HEAD
=======
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
>>>>>>> 0b800275a665b0abd2dec4ca8d31d2b90f4c544f
use App\Http\Controllers\TypeDocumentController;
use App\Http\Controllers\TypeRubriqueController;
use App\Http\Controllers\VersionController;
use App\Livewire\EditDocument;
use App\Models\Classe;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\Entreprise;
<<<<<<< HEAD
=======
use App\Models\Service;

>>>>>>> 0b800275a665b0abd2dec4ca8d31d2b90f4c544f
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('dashboard');
});

<<<<<<< HEAD
Route::get('/dashboard', function () {
    $entreprises = Entreprise::all();
    $classe = Classe::all();
    $dossiers = Dossier::all();
    $documents = Document::all();
=======
// Authentication Routes
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
>>>>>>> 0b800275a665b0abd2dec4ca8d31d2b90f4c544f

Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
<<<<<<< HEAD
    return view('dashboard', compact('entreprises', 'classe', 'dossiers', 'documents', 'recentActivities'));
})->name('dashboard');
Route::resource('/entreprise', EntrepriseController::class)->names('entreprise');
Route::resource('/dossiers', DossierController::class);
Route::resource('/classe', ClasseController::class);
// Route::resource('/documents', DocumentController::class);

Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create');
Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
Route::get('/documents/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
Route::put('/documents/{document}', [DocumentController::class, 'update'])->name('documents.update');
Route::get('/documents/show/{document}', [DocumentController::class, 'show'])->name('documents.show');
Route::delete('/documents/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
// Route::get('/documents/{document}/edit', [EditDocument::class, 'render'])->name('render');
=======

    Route::get('/dashboard', function () {
        $entreprises = Entreprise::all();
        $services = Service::all();
        $dossiers = Dossier::all();
        $documents = Document::all();
>>>>>>> 0b800275a665b0abd2dec4ca8d31d2b90f4c544f

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
        return view('dashboard', compact('entreprises', 'services', 'dossiers', 'documents', 'recentActivities'));
    })->name('dashboard');
    Route::resource('/entreprise', EntrepriseController::class)->names('entreprise');
    Route::resource('/dossiers', DossierController::class);
    Route::resource('/services', ServiceController::class);
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

<<<<<<< HEAD
Route::resource('/rubrique_document', RubriqueDocumentController::class);


Route::get('/login', function (){
    return view('Login&Register.index');
});

// Route::resource('/documents/{document}', [DocumentController::class , 'download']);
Route::get('/documents/download/{document}', [DocumentController::class, 'download'])
    ->name('documents.download');


Route::resource('/versions', VersionController::class);



=======
    Route::resource('/rubrique_document', RubriqueDocumentController::class);

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});
>>>>>>> 0b800275a665b0abd2dec4ca8d31d2b90f4c544f
