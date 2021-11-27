<?php

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;

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
    $recipes = Recipe::latest()->paginate(10);
    return view('welcome', compact('users', 'recipes'));
});

Route::get('/user', function () {
    $users = User::latest()->paginate(10);
    return view('user', compact('users'));
});


Route::post('/recipe', [RecipeController::class, 'storee'])->name('store.recipe');
Route::post('/user', [UserController::class, 'storee'])->name('store.user');
