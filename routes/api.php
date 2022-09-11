<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\GameItemsController;
use App\Http\Controllers\ListsController;
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
    Route::post('lists/{list}', [ListsController::class, 'storeItem'] );
    Route::delete('lists/{list}/item', [ListsController::class, 'removeItem'] );
    Route::apiResource('lists', ListsController::class);
//    Route::apiResource('games', GameItemsController::class);
});



