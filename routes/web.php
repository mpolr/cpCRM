<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaseController;

// Главная страница с списком клиентов (доступно после авторизации)
Route::get('/', [ClientController::class, 'index'])->middleware('auth')->name('clients.index');

// Роуты для работы с клиентами
Route::middleware('auth')->group(function () {
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
    Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

    // Роуты для работы с обращениями (cases)
    Route::post('/clients/{client}/cases', [CaseController::class, 'store'])->name('cases.store');
    Route::put('/cases/{case}', [CaseController::class, 'update'])->name('cases.update');
    Route::delete('/cases/{case}', [CaseController::class, 'destroy'])->name('cases.destroy');
});

// Роуты для аутентификации
Auth::routes();

// Вход и выход из системы
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');