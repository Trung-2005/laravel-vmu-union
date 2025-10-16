<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoanVienController;
use App\Http\Controllers\ChiDoanController;
use App\Http\Controllers\LopController;


Route::get('/', function () {
    return view('index');
});
Route::get('/manage_user', [DoanVienController::class, 'index']);
Route::post('/manage_user', [DoanVienController::class, 'store']);

Route::get('/manage_user', [ChiDoanController::class, 'index']);
Route::post('/manage_user', [ChiDoanController::class, 'store']);

Route::get('/manage_user', [LopController::class, 'index']);
Route::post('/manage_user', [LopController::class, 'store']);

// Route::resource('chidoan', ChiDoanController::class);
// Route::resource('lop', LopController::class);