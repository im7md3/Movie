<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('language/{language}', function ($language) {
    Session()->put('locale', $language);
    return redirect()->back();
})->name('language');

Route::get('/',[App\Http\Controllers\MoviesController::class,'index']);

Route::resource('movies', App\Http\Controllers\MoviesController::class);
Route::resource('actors', App\Http\Controllers\ActorsController::class);
Route::resource('tv', App\Http\Controllers\TvController::class);
Route::get('actors/page/{page}', [App\Http\Controllers\ActorsController::class,'index'])->name('actors.page');
Route::get('actors/create/{id}', [App\Http\Controllers\ActorsController::class,'create']);
Route::post('search', [App\Http\Controllers\MoviesController::class,'search'])->name('search');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

