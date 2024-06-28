<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AnimeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/anime', [AnimeController::class, 'index'])->name('anime.index');
    Route::get('/anime/create', [AnimeController::class, 'create'])->name('anime.create');
    Route::post('/anime', [AnimeController::class, 'store'])->name('anime.store');
    Route::get('/anime/edit/{anime}', [AnimeController::class, 'edit'])->name('anime.edit');
    Route::post('/anime/update/{anime}', [AnimeController::class, 'update'])->name('anime.update');
    Route::get('/anime/delete/{anime}', [AnimeController::class, 'destroy'])->name('anime.delete');
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'authentication']);

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', [UserController::class, 'register'])->name('register');
