<?php

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::prefix('v1')->group(function () {
    Route::addRoute('*', '/', function () {
        return json_encode([
            'paths' => 'TODO'
        ]);
    });

    Route::get('/users/{id?}', [UserController::class, 'get'])->where('id', '[0-9]*');

    Route::post('/users', [UserController::class, 'register']);

    Route::patch('/users', [UserController::class, 'update']);

    Route::delete('/users/{id}', [UserController::class, 'delete'])->where('id', '[0-9]*');

    Route::get('users/authenticate', [UserController::class, 'authenticate']);
});

Route::prefix('v2')->group(function () {
    Route::put('/users/{id?}', [UserController::class, 'idempotent'])->where('id', '[0-9]*');
});
