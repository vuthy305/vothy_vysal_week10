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
Route::get('/categories',['App\Http\Controllers\CategoryController','index'])->name('category');
Route::get('/categories/create',['App\Http\Controllers\CategoryController','create'])->name('category.create');
Route::post('/categories',['App\Http\Controllers\CategoryController','store']);
Route::get('/categories/{category}/edit',['App\Http\Controllers\CategoryController','edit']);
Route::get('/categories/{category}/delete',['App\Http\Controllers\CategoryController','delete']);
Route::put('/categories/{category}',['App\Http\Controllers\CategoryController','update']);
Route::delete('/categories/{category}',['App\Http\Controllers\CategoryController','destroy']);

Route::get('/posts',['App\Http\Controllers\PostController','index'])->name('post');
Route::post('/auth/login',['App\Http\Controllers\AuthController','login']);
Route::get('/auth/register',['App\Http\Controllers\AuthController','register'])->name('register');
Route::post('/auth/signup',['App\Http\Controllers\AuthController','signup']);
Route::get('/auth/logout',['App\Http\Controllers\AuthController','logout']);

Route::get('/posts/create',['App\Http\Controllers\PostController','create'])->name('posts.create');
Route::post('/posts',['App\Http\Controllers\PostController','store']);
Route::get('/posts/{post}/edit',['App\Http\Controllers\PostController','edit']);
Route::put('/posts/{post}',['App\Http\Controllers\PostController','update']);
Route::get('/posts/{post}/delete',['App\Http\Controllers\PostController','delete']);
Route::delete('/posts/{post}',['App\Http\Controllers\PostController','destroy']);






