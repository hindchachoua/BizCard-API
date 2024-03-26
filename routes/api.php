<?php
use App\Models\Card;
use App\Http\Controllers\CardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('cards', CardController::class);

// Route::get('/cards', [CardController::class, 'index']);

// Route::post('/cards', [CardController::class, 'store']);

// Route::get('/cards/{id}', [CardController::class, 'show']); 

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

