<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\DashBoardUsersController;
use App\Http\Controllers\DashBoardPostsController;
use App\Http\Controllers\PostController;

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

Route::get('/',[HomeController::class,'index'])->name('start');

Route::get('/dashboard',[DashBoardController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/users',[DashBoardUsersController::class,'index'])->middleware(['auth'])->name('dashboard/users');
Route::get('/dashboard/posts',[DashBoardPostsController::class,'index'])->middleware(['auth'])->name('dashboard/posts');
Route::get('/new_post',[PostController::class,'create'])->middleware(['auth'])->name('new_post');
Route::post('/add_post',[PostController::class,'store'])->middleware(['auth'])->name('add_post');

require __DIR__.'/auth.php';
