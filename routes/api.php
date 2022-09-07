<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\RetroGameItemsController;
use App\Http\Controllers\RetroListsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return "hello world";
});

Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login', [UserAuthController::class, 'login']);

route::middleware('auth:api')->group(function () {
    Route::apiResource('lists', RetroListsController::class);
    Route::apiResource('games', RetroGameItemsController::class);
});



