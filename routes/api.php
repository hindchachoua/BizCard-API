<?php

use App\Http\Controllers\AuthController;
use App\Models\Card;
use App\Http\Controllers\CardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthController::class, 'registerpost'])->name('registerpost');
Route::post('/login', [AuthController::class, 'loginpost'])->name('loginpost');

// Route::get('/cards/{name}', [CardController::class, 'getcardwithuser']);



Route::get('/cards/{id}', [CardController::class, 'show']); 
// Route::apiResource('/cards', CardController::class);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('user', function (Request $request) {
        return [
            'user' => $request->user(),
            'currentToken' => $request->user()->currentAccessToken()
        ];
    });
    Route::get('/cards', [CardController::class, 'index']);
    Route::post('/cards/add', [CardController::class, 'store']);
    Route::put('/cards/{id}', [CardController::class, 'update']);
    Route::delete('/cards/{id}', [CardController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


