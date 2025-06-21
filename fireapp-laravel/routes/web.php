<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IncendioController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Página inicial pública (antes de logar)
Route::get('/', function () {
    return view('home');
})->name('home');

// Página inicial depois do login (home interna)
Route::get('/home-interna', function () {
    return view('home-interna');
})->middleware(['auth'])->name('home-interna');

// Dashboard padrão Breeze (opcional)
Route::get('/dashboard', function () {
    return redirect()->route('home-interna');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo protegido por login
Route::middleware('auth')->group(function () {
    // PERFIL DO USUÁRIO
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Notificações
    Route::get('/profile/notifications', [ProfileController::class, 'editNotifications'])->name('profile.notifications');
    Route::post('/profile/notifications', [ProfileController::class, 'updateNotifications'])->name('profile.notifications.update');

    // Privacidade
    Route::get('/profile/privacy', [ProfileController::class, 'editPrivacy'])->name('profile.privacy');
    Route::post('/profile/privacy', [ProfileController::class, 'updatePrivacy'])->name('profile.privacy.update');

    // INCÊNDIOS
    Route::get('/incendios', [IncendioController::class, 'index'])->name('incendios.index');
    Route::get('/incendios/create', [IncendioController::class, 'create'])->name('incendios.create');
    Route::post('/incendios', [IncendioController::class, 'store'])->name('incendios.store');
    Route::get('/incendios/{incendio}', [IncendioController::class, 'show'])->name('incendios.show');
    Route::get('/incendios/{incendio}/edit', [IncendioController::class, 'edit'])->name('incendios.edit');
    Route::put('/incendios/{incendio}', [IncendioController::class, 'update'])->name('incendios.update');
    Route::delete('/incendios/{incendio}', [IncendioController::class, 'destroy'])->name('incendios.destroy');

    // Painel ADM
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Rotas de autenticação Breeze
require __DIR__ . '/auth.php';
