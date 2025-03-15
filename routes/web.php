<?php

use App\Http\Controllers\EntrepriseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/entreprise',EntrepriseController::class);
Route::get('/entreprise/{entreprise}/edit',[EntrepriseController::class,'edit'])->name('entreprise.edit');
