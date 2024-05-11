<?php

use App\Http\Controllers\AdminDashboard\AdminController;
use App\Http\Controllers\AdminDashboard\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\KadesDashboard\KadesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffDashboard\StaffController;
use App\Http\Controllers\WargaDashboard\SuratController;
use App\Http\Controllers\WargaDashboard\WargaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/cek/surat/{id}', [FrontController::class, 'cek'])->name('cek.surat');
Route::get('/download/surat/{id}', [FrontController::class, 'unduh'])->name('unduh.surat');
Route::get('/preview/surat', [FrontController::class, 'preview'])->name('preview.surat');
Route::get('/qr', [FrontController::class, 'qr'])->name('qr');

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

//kades
Route::middleware(['auth', 'verified', 'role:kades'])->group(function () {
    Route::get('kades', [KadesController::class, 'dashboard'])->name('kades.dashboard');
    Route::get('kades/list', [KadesController::class, 'list'])->name('kades.pengajuan.list');
    Route::get('kades/reject', [KadesController::class, 'reject'])->name('kades.pengajuan.reject');
    Route::get('kades/berkas/{id}', [KadesController::class, 'berkas'])->name('kades.pengajuan.berkas');
    Route::put('kades/pengajuan/acc/{id}', [KadesController::class, 'acc'])->name('kades.pengajuan.acc');
    Route::put('kades/pengajuan/rej/{id}', [KadesController::class, 'rej'])->name('kades.pengajuan.rej');
    Route::resource('kades/pengajuan', KadesController::class)->names([
        'index' => 'kades.pengajuan.index',
        'create' => 'kades.pengajuan.create',
        'store' => 'kades.pengajuan.store',
        'show' => 'kades.pengajuan.show',
        'edit' => 'kades.pengajuan.edit',
        'update' => 'kades.pengajuan.update',
        'destroy' => 'kades.pengajuan.destroy'
    ]);
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
});

Route::middleware(['auth', 'verified', 'role:staff'])->group(function () {
    Route::get('staff', [StaffController::class, 'dashboard'])->name('staff.dashboard');
    Route::get('staff/list', [StaffController::class, 'list'])->name('staff.pengajuan.list');
    Route::get('staff/berkas/{id}', [StaffController::class, 'berkas'])->name('staff.pengajuan.berkas');
    Route::put('staff/pengajuan/{id}', [StaffController::class, 'confirm'])->name('staff.pengajuan.confirm');
    Route::resource('staff/pengajuan', StaffController::class)->names([
        'index' => 'staff.pengajuan.index',
        'create' => 'staff.pengajuan.create',
        'store' => 'staff.pengajuan.store',
        'show' => 'staff.pengajuan.show',
        'edit' => 'staff.pengajuan.edit',
        'update' => 'staff.pengajuan.update',
        'destroy' => 'staff.pengajuan.destroy'
    ]);
});

// Warga
Route::middleware(['auth', 'verified', 'role:warga'])->group(function () {
    Route::get('warga', WargaController::class)->name('warga.dashboard');
    Route::get('warga/surat/berkas/{id}', [SuratController::class, 'berkas'])->name('warga.surat.berkas');
    Route::post('warga/surat/send/{id}', [SuratController::class, 'send'])->name('warga.surat.send');
    Route::get('warga/surat/draft', [SuratController::class, 'draft'])->name('warga.surat.draft');
    Route::get('warga/surat/riwayat', [SuratController::class, 'riwayat'])->name('warga.surat.riwayat');
    Route::resource('warga/surat', SuratController::class)->names([
        'index' => 'warga.surat.index',
        'create' => 'warga.surat.create',
        'store' => 'warga.surat.store',
        'show' => 'warga.surat.show',
        'edit' => 'warga.surat.edit',
        'update' => 'warga.surat.update',
        'destroy' => 'warga.surat.destroy'
    ]);
    Route::get('warga/surat/pdf/{id}', [SuratController::class, 'pdf'])->name('warga.surat.pdf');
});

require __DIR__.'/auth.php';
