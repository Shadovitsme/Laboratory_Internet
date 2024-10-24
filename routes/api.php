<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/', function () {
        return 'API';
    });
    Route::get('/users', function () {
        return 'API';
    });
    Route::get('/authenticate', function () {
        return 'API';
    });
    Route::get('/register', function () {
        return 'API';
    });
});
