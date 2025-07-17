<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('articles', ArticleController::class);
Route::resource('categories', CategoryController::class);
Route::post('/articles/{id}/like', [ArticleController::class, 'like'])->name('articles.like');