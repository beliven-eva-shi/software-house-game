<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/production', function () {
    return view('production');
});
Route::get('/sales', function () {
    return view('sales');
});

Route::get('/hr', function () {
    return view('hr');
});
