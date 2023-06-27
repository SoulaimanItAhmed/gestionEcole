<?php

use App\Http\Controllers\AdmincommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [AuthController::class, 'show'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/register', [AuthController::class, 'afficher'])->name('signup');
Route::post('/Signup',[AuthController::class, 'register'])->name('register');


Route::resource('posts',PostsController::class);
Route::get('/posts/{post}', [PostsController::class, 'show'])->name('posts.show');

Route::resource('admin',AdminController::class);
Route::resource('admin_comment',AdmincommentController::class);
Route::post('/search',[SearchController::class, 'index'])->name('search');

Route::get('/posts/{id}',[PostsController::class ,'show'])->name('post.show');
