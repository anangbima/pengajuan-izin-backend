<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\UserController;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/sign-out', [AuthController::class, 'signOut']);
    Route::post('/reset-password/{user}', [AuthController::class, 'resetPassword']);
    Route::post('/update-password/{user}', [AuthController::class, 'updatePassword']);

    // User
    // Route::get('/user', [UserController::class, 'index']);
    Route::resource('/user', UserController::class);
    Route::get('/user/{status?}/{role?}', [UserController::class, 'index']);
    Route::post('/verifikasi-user/{user}', [UserController::class, 'updateStatus']);
    Route::post('/change-role/{user}', [UserController::class, 'changeRole']);

    // Izin
    // Route::resource('user', UserController::class);('/izin', [IzinController::class, 'index']);
    Route::resource('/izin', IzinController::class);
    Route::get('/izin-user/{user}', [IzinController::class, 'getIzinbyUser']);
    Route::post('/update-status-izin/{izin}', [IzinController::class, 'updateStatus']);
    Route::post('/update-izin/{izin}', [IzinController::class, 'update']);

    // Komentar
    Route::resource('/komentar', KomentarController::class);
});

Route::post('/sign-in', [AuthController::class, 'signIn']);
Route::post('/sign-up', [AuthController::class, 'signUp']);

// Route::resource('/user', UserController::class);

