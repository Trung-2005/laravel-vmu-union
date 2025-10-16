<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('manage_user');
})->where('any', '.*');