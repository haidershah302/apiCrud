<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {

    Route::delete('/logout', [AuthController::class, 'destroy']);
    Route::get('/user', [AuthController::class, 'index']);

});


Route::post('/login_user', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'store']);


require __DIR__.'/auth.php';
