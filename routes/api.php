<?php

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\IngredientsController;

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
Route::get('/last-recipe-create', [RecipeController::class, 'lastRecipe']);

//! FAVORITES
Route::get('/favorite/{id}', [FavoriteController::class, 'index']);
Route::get('/favorite2/{id}', [FavoriteController::class, 'index2']);
Route::get('/favorite-user', [FavoriteController::class, 'favoriteUser']);
Route::get('/favorite/{idRecipe}/{idUser}', [FavoriteController::class, 'show']);
Route::post('/favorite', [FavoriteController::class, 'store']);
Route::delete('/favorite/{id}', [FavoriteController::class, 'delete']);

//! RATING
Route::get('/rating', [RatingController::class, 'index']);
Route::get('/rating/{idRecipe}/{idUser}', [RatingController::class, 'show']);
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

//! Report
Route::get('/report', [ReportController::class, 'index']);
Route::get('/report/{idRecipe}/{idUser}', [ReportController::class, 'show']);
Route::post('/report', [ReportController::class, 'store']);

//! INGREDIENTS
Route::post('/ingredients', [IngredientsController::class, 'store']);

//! STEP
Route::post('/step', [StepController::class, 'store']);

//! CATEGORY RECIPE
Route::post('/category-recipe', [CategoryRecipesController::class, 'store']);
