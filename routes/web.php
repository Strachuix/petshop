<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetController;

Route::view('/', 'welcome');

// Auth routes
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('loginPost');

Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('/registration', [AuthController::class, 'registrationPost'])->name('registrationPost');  // Poprawiona literówka

// Pet routes
Route::get('/pets', [PetController::class, 'getPets'])->name('pets.index');

Route::get('/pets/add', function () {
    return view('add-pet');
})->name('pets.add');

Route::post('/pets', [PetController::class, 'createPet'])->name('pets.store');  // Usunięty duplikat

Route::get('/pets/find', function () {
    return view('find-pet');
})->name('pets.find');

Route::get('/pets/{id}', [PetController::class, 'getPet'])->name('pets.detail');
Route::put('/pets/{id}', [PetController::class, 'updatePet'])->name('pets.update');
Route::delete('/pets/{id}', [PetController::class, 'deletePet'])->name('pets.delete');