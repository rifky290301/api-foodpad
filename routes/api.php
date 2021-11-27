<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\FavoriteController;

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

// !AUTH
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


//! RECIPES
Route::get('/recipes', [RecipeController::class, 'index']);
Route::post('/recipes', [RecipeController::class, 'store']);
Route::put('/recipes/{id}', [RecipeController::class, 'update']);
Route::delete('/recipes/{id}', [RecipeController::class, 'delete']);

//! FAVORITES
Route::get('/favorites', [FavoriteController::class, 'index']);
Route::post('/favorites', [FavoriteController::class, 'store']);
Route::delete('/favorites/{id}', [FavoriteController::class, 'delete']);

//! RATING
Route::get('/rating', [RatingController::class, 'index']);
Route::post('/rating', [RatingController::class, 'store']);
Route::delete('/rating/{id}', [RatingController::class, 'delete']);

//! USER
Route::get('/user', [UserController::class, 'index']);
Route::delete('/user/{id}', [UserController::class, 'delete']);
Route::get('/user/photo-profile/{image}', [UserController::class, 'photoProfile']);
