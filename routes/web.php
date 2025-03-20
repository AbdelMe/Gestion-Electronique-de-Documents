<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DossierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/entreprise', EntrepriseController::class);
Route::resource('/dossiers', DossierController::class);
Route::resource('/services', ServiceController::class);
// Route::resource('/documents', DocumentController::class);
Route::get('/documents',[DocumentController::class , 'index'])->name('documents.index');
Route::get('/documents/create',[DocumentController::class , 'create'])->name('documents.create');
Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
Route::get('/documents/{document}/edit',[DocumentController::class , 'edit'])->name('documents.edit');
Route::put('/documents/{document}', [DocumentController::class, 'update'])->name('documents.update');
Route::get('/documents/show/{document}',[DocumentController::class , 'show'])->name('documents.show');
Route::delete('/documents/{document}',[DocumentController::class , 'destroy'])->name('documents.destroy');

Route::get('/documents/SelectedType',[DocumentController::class , 'SelectedType'])->name('documents.SelectedType');

