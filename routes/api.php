<?php

use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
route::get('/hello', function() {
    return ["message" =>"helo world"];
});

route::get('/info', function() {
    return response()->json([
        'app' => 'Task Api',
        'version' => '1.0.0',
        'author' => 'aku'
    ]);
});

Route::post('/hello', function () {
    return response()->json([
        'message' => 'POST berhasil'
    ]);
});

Route::get('/profile', function () {
    return response()->json([
        'Nama' => 'Muhammad Rizqi Arsy&apos&adi',
        'NIM ' => 'A11.2026.16916'
    ]);
});

Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks/{id}', [TaskController::class, 'show']);
Route::put('/tasks/{id}', [TaskController::class, 'update']);
Route::patch('/tasks/{id}', [TaskController::class, 'update']);
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
