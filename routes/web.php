<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;

// Accueil
Route::redirect('/', '/objets');

// page des composents
Route::view('/composants', 'styleguide')->name('styleguide');

// routes pour objets
Route::get('/objets', [ItemController::class, 'index'])->name('items.index');
Route::get('/objets/nouveau', [ItemController::class, 'create'])->name('items.create');
Route::post('/objets', [ItemController::class, 'store'])->name('items.store');
Route::get('/objets/{item}', [ItemController::class, 'show'])->name('items.show');
Route::get('/objets/{item}/modifier', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/objets/{item}', [ItemController::class, 'update'])->name('items.update');
Route::patch('/objets/{item}/restitution', [ItemController::class, 'return'])->name('items.return');
Route::delete('/objets/{item}', [ItemController::class, 'destroy'])->name('items.destroy');

// routes pour places
Route::get('/lieux/{place}', [PlaceController::class, 'show'])->name('places.show');
