<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoanVienController;

Route::get('/', function () {
    return view('index');
});
Route::get('/manage_user', [DoanVienController::class, 'index'])->name('user.manage');
Route::post('/manage_user', [DoanVienController::class, 'store'])->name('doanvien.store');