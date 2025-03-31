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
use App\Livewire\EditDocument;
use App\Models\Classe;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\Entreprise;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    $entreprises = Entreprise::all();
    $classe = Classe::all();
    $dossiers = Dossier::all();
    $documents = Document::all();

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

Route::get('/documents/SelectedType', [DocumentController::class, 'SelectedType'])->name('documents.SelectedType');

Route::resource('/type_documents', TypeDocumentController::class);
Route::resource('/rubrique', RubriqueController::class);


Route::resource('/type_rubrique', TypeRubriqueController::class);

Route::resource('/rubrique_document', RubriqueDocumentController::class);


Route::get('/login', function (){
    return view('Login&Register.index');
});

// Route::resource('/documents/{document}', [DocumentController::class , 'download']);
Route::get('/documents/download/{document}', [DocumentController::class, 'download'])
    ->name('documents.download');


Route::resource('/versions', VersionController::class);



