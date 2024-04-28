<?php

use App\Http\Controllers\AdminDashboard\AdminController;
use App\Http\Controllers\AdminDashboard\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WargaDashboard\SuratController;
use App\Http\Controllers\WargaDashboard\WargaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('admin', AdminController::class)->name('admin.dashboard');
    Route::resource('admin/users', UserController::class)->names([
    'index' => 'admin.users.index',
    'create' => 'admin.users.create',
    'store' => 'admin.users.store',
    'show' => 'admin.users.show',
    'edit' => 'admin.users.edit',
    'update' => 'admin.users.update',
    'destroy' => 'admin.users.destroy'
    ]);
    // Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
    // Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    // Route::post('admin/users', [UserController::class, 'store'])->name('admin.users.store');
    // Route::put('admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    // Route::get('admin/users/{id}', [UserController::class, 'show'])->name('admin.users.show');
    // Route::get('admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    // Route::delete('admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

// Warga
Route::middleware(['auth', 'verified', 'role:warga'])->group(function () {
    Route::get('warga', WargaController::class)->name('warga.dashboard');
    Route::resource('warga.surat', SuratController::class)->names([
        'index' => 'warga.surat.index',
        'create' => 'warga.surat.create',
        'store' => 'warga.surat.store',
        'show' => 'warga.surat.show',
        'edit' => 'warga.surat.edit',
        'update' => 'warga.surat.update',
        'destroy' => 'warga.surat.destroy'
    ]);
    Route::get('warga/surat/pdf', [SuratController::class, 'pdf'])->name('warga.surat.pdf');
});

require __DIR__.'/auth.php';
