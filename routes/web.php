<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'dashboard']);
Route::get('/data-distribusi-frekuensi', [PageController::class, 'frequency'])->name('frequency');
Route::get('/tabel-deskripsi-data', [PageController::class, 'description'])->name('description');
Route::get('/data-bergolong', [PageController::class, 'groupdata'])->name('data-bergolong');
Route::post('/import-data', [PageController::class, 'import'])->name('import-data');
Route::get('/export-data', [PageController::class, 'export'])->name('export-data');

Route::resource('/data-tunggal', MahasiswaController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';