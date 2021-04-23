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
Route::get('/posts',['App\Http\Controllers\PostController','index']);
Route::get('/categories',['App\Http\Controllers\CategoryController','index'])->name('category');
Route::get('/categories/create',['App\Http\Controllers\CategoryController','create'])->name('category.create');
Route::post('/categories',['App\Http\Controllers\CategoryController','store']);
Route::get('/categories/{category}/edit',['App\Http\Controllers\CategoryController','edit']);
Route::get('/categories/{category}/delete',['App\Http\Controllers\CategoryController','delete']);
Route::put('/categories/{category}',['App\Http\Controllers\CategoryController','update']);
Route::delete('/categories/{category}',['App\Http\Controllers\CategoryController','destroy']);

