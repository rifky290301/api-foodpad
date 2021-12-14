<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;
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


//! RECIPE
Route::get('/recipe', [RecipeController::class, 'index']);
Route::get('/recipe2', [RecipeController::class, 'index2']);
Route::get('/sementara', [RecipeController::class, 'sementara']);
Route::get('/recipe/{id}', [RecipeController::class, 'show']);
Route::get('/recipe2/{id}', [RecipeController::class, 'show2']);
Route::post('/recipe', [RecipeController::class, 'store']);
Route::put('/recipe/{id}', [RecipeController::class, 'update']);
Route::delete('/recipe/{id}', [RecipeController::class, 'delete']);
Route::get('/recommendation', [RecipeController::class, 'recommendation']);
Route::get('/trending', [RecipeController::class, 'trending']);
Route::get('/trending2', [RecipeController::class, 'trending2']);
Route::get('/recipe/thumbnail/{image}', [RecipeController::class, 'thumbnailImage']);
Route::get('/recipe-category/{category}', [RecipeController::class, 'recipeByCategory']);
Route::get('/search/{name}', [RecipeController::class, 'search']);

//! FAVORITES
Route::get('/favorite/{id}', [FavoriteController::class, 'index']);
Route::get('/favorite2/{id}', [FavoriteController::class, 'index2']);
Route::get('/favorite-user', [FavoriteController::class, 'favoriteUser']);
Route::get('/favorite/{idRecipe}/{idUser}', [FavoriteController::class, 'show']);
Route::post('/favorite', [FavoriteController::class, 'store']);
Route::delete('/favorite/{id}', [FavoriteController::class, 'delete']);

//! RATING
Route::get('/rating', [RatingController::class, 'index']);
Route::post('/rating', [RatingController::class, 'store']);

//! USER
Route::get('/user', [UserController::class, 'index']);
Route::delete('/user/{id}', [UserController::class, 'delete']);
Route::get('/user/photo-profile/{image}', [UserController::class, 'photoProfile']);

//! CATEGORY
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category2', [CategoryController::class, 'index2']);
Route::post('/category', [CategoryController::class, 'store']);
Route::delete('/category/{id}', [CategoryController::class, 'delete']);
