<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});
Route::get('/manage_user', function () {
    return view('manage_user');
});