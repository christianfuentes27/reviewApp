<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('review/book', [App\Http\Controllers\ReviewController::class, 'index']);
Route::get('review/movie', [App\Http\Controllers\ReviewController::class, 'index']);
Route::get('review/record', [App\Http\Controllers\ReviewController::class, 'index']);
Route::resource('review', App\Http\Controllers\ReviewController::class)->except('index');
Route::get('logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::resource('user', App\Http\Controllers\HomeController::class)->except(['create', 'store', 'show']);
Route::resource('comment', App\Http\Controllers\CommentController::class)->except(['index', 'create', 'show']);