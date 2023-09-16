<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
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

Route::middleware('guest')->group(function(){
    Route::post('login', [LoginController::class, "login"])->name('login');
    Route::get('login', [LoginController::class, "showLoginPage"]);
});

Route::middleware('auth')->group(function(){
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::put('settings', [AdminController::class, 'edit'])->name('admin.update');
    Route::get('settings', [AdminController::class, 'show'])->name('admin.profile');

    Route::post('change-password', [AdminController::class, 'changePassword'])->name('admin.password');
    Route::post('logout', [LoginController::class, "logout"])->name('logout');

    Route::prefix('siswa')->group(function(){
        route::get("", [SiswaController::class, 'index'])->name('siswa.index');
        route::post("tambah", [SiswaController::class, 'store'])->name('siswa.store');
        route::get("tambah", [SiswaController::class, 'create'])->name('siswa.add');

        Route::put('detail/{id}', [SiswaController::class, 'update'])->name('siswa.update');
        Route::get('detail/{id}', [SiswaController::class, 'show'])->name('siswa.detail');
        Route::get('delete/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    });

    Route::prefix('ekskul')->group(function(){
        Route::put("", [EkskulController::class, "update"])->name('ekskul.update');
        Route::post("", [EkskulController::class, "store"])->name('ekskul.add');
        Route::get("{id}/delete", [EkskulController::class, "destroy"])->name('ekskul.delete');
    });


});
