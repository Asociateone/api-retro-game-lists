<?php

use App\Http\Controllers\RetroListsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return "hello world";
});


Route::get('lists', [RetroListsController::class, 'index']);

