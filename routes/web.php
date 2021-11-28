<?php

use App\Models\Step;
use App\Models\User;
use App\Models\Rating;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Ingredients;
use App\Models\CategoryRecipes;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StepController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\CategoryRecipesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $users = User::all();
    $categories = Category::all();
    $recipes = Recipe::latest()->paginate(10);
    return view('welcome', compact('users', 'categories', 'recipes'));
});

Route::get('/user', function () {
    $users = User::latest()->paginate(10);
    return view('user', compact('users'));
});

Route::get('/ingredients', function () {
    $ingredients = Ingredients::with("recipe")->latest()->paginate(10);
    $recipes = Recipe::all();
    return view('ingredients', compact('ingredients', 'recipes'));
});

Route::get('/category', function () {
    $categories = Category::latest()->paginate(10);
    return view('category', compact('categories'));
});

Route::get('/category-recipe', function () {
    $recipes = Recipe::all();
    $categories = Category::all();
    $categoryRecipe = CategoryRecipes::latest()->paginate(10);
    return view('category-recipe', compact('categoryRecipe', 'categories', 'recipes'));
});

Route::get('/step', function () {
    $recipes = Recipe::all();
    $steps = Step::with('recipe')->latest()->paginate(10);
    return view('step', compact('steps', 'recipes'));
});

Route::get('/rating', function () {
    $recipes = Recipe::all();
    $users = User::all();
    $ratings = Rating::with(['recipe', 'user'])->latest()->paginate(10);
    return view('rating', compact('ratings', 'recipes', 'users'));
});

Route::get('/list-api', function () {
    $baseURL = URL::to('');
    $baseURL .= '/api';
    return view('list-api', compact('baseURL'));
});


Route::post('/recipe', [RecipeController::class, 'storee'])->name('store.recipe');
Route::post('/user', [UserController::class, 'storee'])->name('store.user');
Route::post('/ingredients', [IngredientsController::class, 'storee'])->name('store.ingredients');
Route::post('/rating', [RatingController::class, 'storee'])->name('store.rating');
Route::post('/step', [StepController::class, 'storee'])->name('store.step');
Route::post('/category', [CategoryController::class, 'storee'])->name('store.category');
Route::post('/category-recipe', [CategoryRecipesController::class, 'storee'])->name('store.category-recipe');


Route::delete('/recipe/{id}', [RecipeController::class, 'deletee']);
Route::delete('/user/{id}', [UserController::class, 'deletee']);
Route::delete('/ingredients/{id}', [IngredientsController::class, 'deletee']);
Route::delete('/rating/{id}', [RatingController::class, 'deletee']);
Route::delete('/step/{id}', [StepController::class, 'deletee']);
Route::delete('/category/{id}', [CategoryController::class, 'deletee']);
Route::delete('/category-recipe/{id}', [CategoryRecipesController::class, 'deletee']);
