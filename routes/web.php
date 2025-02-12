<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\UserController;
Route::resource('users', UserController::class);

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');



use App\Http\Controllers\OmsetController;

Route::get('/omsets', [OmsetController::class, 'index'])->name('omsets.index');
Route::get('/omsets/create', [OmsetController::class, 'create'])->name('omsets.create');
Route::post('/omsets', [OmsetController::class, 'store'])->name('omsets.store');
Route::get('/omsets/{omset}/edit', [OmsetController::class, 'edit'])->name('omsets.edit');
Route::put('/omsets/{omset}', [OmsetController::class, 'update'])->name('omsets.update');
Route::delete('/omsets/{omset}', [OmsetController::class, 'destroy'])->name('omsets.destroy');

Route::get('/omsets/rekap', [OmsetController::class, 'rekapBulanan'])->name('omsets.rekap');

use App\Http\Controllers\ProjectProgressController;

// Route untuk Project Progress
Route::get('/project_progress', [ProjectProgressController::class, 'index'])->name('project_progress.index'); // Tampilkan semua data
Route::get('/project_rogress/create', [ProjectProgressController::class, 'create'])->name('project_progress.create'); // Form tambah data
Route::post('/project_progress', [ProjectProgressController::class, 'store'])->name('project_progress.store'); // Simpan data baru
Route::get('/project_progress/{id}/edit', [ProjectProgressController::class, 'edit'])->name('project_progress.edit'); // Form edit data
Route::put('/project_progress/{id}', [ProjectProgressController::class, 'update'])->name('project_progress.update'); // Update data
Route::delete('/project_progress/{id}', [ProjectProgressController::class, 'destroy'])->name('project_progress.destroy'); // Hapus data
