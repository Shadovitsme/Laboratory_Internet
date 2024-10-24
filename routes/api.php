<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/', function (Request $request, string $id) {
        return $request->path();;
    });

    Route::get('/users', function (Request $request, string $id) {
        return $request->path();
    });

    Route::get('/users/{id?}', function (Request $request, string $id) {
        return $request->path();;
    })->where('id', '[0-9]+');

    Route::post('/users', function (Request $request, string $id) {
        return $request->path();;
    });

    Route::patch('/users', function (Request $request, string $id) {
        return $request->path();;
    });

    Route::delete('/users{id}', function (Request $request, string $id) {
        return $request->path();;
    })->where('id', '[0-9]+');

    Route::get('/authenticate', function (Request $request, string $id) {
        return $request->path();;
    });
});

Route::prefix('v2')->group(function () {
    Route::put('/users', function (Request $request, string $id) {
        return $request->path();;
    });
});