<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\DashBoardUsersController;
use App\Http\Controllers\DashBoardPostsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DisplayPostController;
use App\Http\Controllers\CommentController;

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
Route::get('/post/{post}',[DisplayPostController::class, 'index'])->name('post.show');
Route::post('/comment/add',[CommentController::class, 'store'])->middleware(['auth'])->name('comment.add');
Route::post('/comment/delete',[CommentController::class, 'destroy'])->middleware(['auth'])->name('comment.delete');

Route::get('/dashboard',[DashBoardController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/users',[DashBoardUsersController::class,'index'])->middleware(['auth'])->name('dashboard/users');
Route::get('/dashboard/choose_user',[DashBoardUsersController::class,'create'])->middleware(['auth'])->name('dashboard/users/choose_user');
Route::post('/dashboard/update_user',[DashBoardUsersController::class,'update'])->middleware(['auth'])->name('dashboard/users/update_user');
Route::post('/dashboard/show_user',[DashBoardUsersController::class,'show'])->middleware(['auth'])->name('dashboard/users/show_user');

Route::get('/dashboard/posts',[DashBoardPostsController::class,'index'])->middleware(['auth'])->name('dashboard/posts');
Route::post('/dashboard/update_post',[DashBoardPostsController::class,'update'])->middleware(['auth'])->name('dashboard/posts/update_post');
Route::post('/dashboard/edit',[DashBoardPostsController::class,'edit'])->middleware(['auth'])->name('dashboard/posts/edit');

Route::get('/settings',[SettingsController::class,'index'])->middleware(['auth'])->name('settings');
Route::get('/new_post',[PostController::class,'create'])->middleware(['auth'])->name('new_post');
Route::post('/add_post',[PostController::class,'store'])->middleware(['auth'])->name('add_post');

require __DIR__.'/auth.php';
