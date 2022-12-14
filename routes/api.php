<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
    

Route::post('/login', [App\Http\Controllers\API\AuthController::class,'login']);
Route::post('/logout', [App\Http\Controllers\API\AuthController::class,'logout']);
Route::put('/register/create', [App\Http\Controllers\API\AuthController::class,'register']);
Route::get('/current-user', [App\Http\Controllers\API\AuthController::class,'currentUser'])->middleware("auth:sanctum");
Route::post('/updateUsers', [App\Http\Controllers\API\UserController::class,'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});