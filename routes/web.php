<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChiDoanController;
use App\Http\Controllers\DoanVienController;
use App\Http\Controllers\LopController;
use App\Models\DoanVien;

Route::get('/', function () {
    return view('index');
});
Route::get('/manage_user', function () {
    return view('manage_user');
});

Route::post('/add_doanvien', [DoanVienController::class, 'store'])->name('add_doanvien');