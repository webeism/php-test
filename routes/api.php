<?php

use App\Http\Controllers\TaskController;

Route::prefix('tasks')->group(function () {
    Route::post('/', [TaskController::class, 'store']);
});
