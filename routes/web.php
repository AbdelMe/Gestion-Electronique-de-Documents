<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\RubriqueController;
use App\Http\Controllers\RubriqueDocumentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TypeDocumentController;
use App\Http\Controllers\TypeRubriqueController;
use App\Models\Document;
use App\Models\Dossier;
use App\Models\Entreprise;
use App\Models\Rubrique;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {

    return view('dashboard');
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

Route::resource('/rubrique_document', RubriqueDocumentController::class);
