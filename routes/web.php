<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

Route::view('/', 'welcome');

Route::get('/pets', [PetController::class, 'getPets'])->name('pets.index');

Route::get('/pets/add', function () {
    return view('add-pet');
})->name('pets.add');

Route::post('/pets', [PetController::class, 'createPet'])->name('pets.store');

Route::get('/pets/find', function () {
    return view('find-pet');
})->name('pets.find');

Route::get('/pets/{id}', [PetController::class, 'getPet'])->name('pets.detail');
Route::get('/pets/{id}/update', [PetController::class, 'updatePetForm'])->name('pets.edit');
Route::put('/pets', [PetController::class, 'updatePet'])->name('pets.update');
Route::delete('/pets/{id}', [PetController::class, 'deletePet'])->name('pets.delete');