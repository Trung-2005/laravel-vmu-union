<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoanVienController;
use App\Http\Controllers\ChiDoanController;
use App\Http\Controllers\LopController;

Route::get('/', function () {
    return view('index');
});
Route::get('/manage_user', [DoanVienController::class, 'index'])->name('user.manage');
Route::post('/manage_user', [DoanVienController::class, 'store'])->name('doanvien.store');

Route::resource('chidoan', ChiDoanController::class);
Route::resource('lop', LopController::class);