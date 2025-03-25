<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\RubriqueController;
use App\Http\Controllers\RubriqueDocumentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::resource('/entreprise', EntrepriseController::class);
    Route::resource('/dossiers', DossierController::class);
    Route::resource('/services', ServiceController::class);

    // Document routes
    Route::prefix('documents')->group(function () {
        Route::get('/', [DocumentController::class, 'index'])->name('documents.index');
        Route::get('/create', [DocumentController::class, 'create'])->name('documents.create');
        Route::post('/', [DocumentController::class, 'store'])->name('documents.store');
        Route::get('/{document}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
        Route::put('/{document}', [DocumentController::class, 'update'])->name('documents.update');
        Route::get('/show/{document}', [DocumentController::class, 'show'])->name('documents.show');
        Route::delete('/{document}', [DocumentController::class, 'destroy'])->name('documents.destroy');
        Route::get('/SelectedType', [DocumentController::class, 'SelectedType'])->name('documents.SelectedType');
    });
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});
