<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/entreprise', EntrepriseController::class);
Route::resource('/services', ServiceController::class);
Route::resource('/documents', DocumentController::class);
// Route::get('/entreprise/{entreprise}/edit',[EntrepriseController::class,'edit'])->name('entreprise.edit');
