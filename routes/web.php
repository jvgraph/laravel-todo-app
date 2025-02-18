<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

// Route::apiResource('tasks', TaskController::class);

Route::get('/api/tasks', [TaskController::class, 'index']);
Route::prefix('/api/tasks')->group(function(){
    Route::post('/store',[TaskController::class, 'store']);
    Route::put('/{id}' , [TaskController::class, 'update']);
    Route::delete('/{id}', [TaskController::class, 'destroy'] );
});