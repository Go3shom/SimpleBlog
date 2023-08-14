<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('posts');
});

Auth::routes();


Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);


Route::middleware(['auth'])
    ->group(function () {
        Route::get('/home', [HomeController::class, 'index'])
            ->name('home');

        Route::resource('posts', PostController::class)
            ->except(['index', 'show']);

        Route::resource('categories', CategoryController::class)
            ->except(['index', 'show']);
    });
