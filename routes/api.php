<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks', [TaskController::class, 'index']);
Route::put('/tasks/{id}/{token}', [TaskController::class, 'update']);
