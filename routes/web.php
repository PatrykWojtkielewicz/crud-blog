<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashBoardController as AdminController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\DislikeController;
use App\Http\Controllers\TagController;

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

Route::get('/post/{post}',[PostController::class, 'show'])->name('post.show');
Route::get('/post/{post}#comments',[PostController::class, 'show'])->name('post.show.comment');
Route::get('/tags/{tag}',[TagController::class,'show'])->name('tag.show');

Route::group(['middleware' => 'auth'], function(){
    Route::post('/comment/add',[CommentController::class, 'store'])->name('comment.add');
    Route::post('/comment/delete',[CommentController::class, 'destroy'])->name('comment.delete');

    Route::get('/settings',[SettingsController::class,'index'])->name('settings');
    Route::get('/new_post',[PostController::class,'create'])->name('new_post');
    Route::post('/add_post',[PostController::class,'store'])->name('add_post');

    Route::put('/like/{post}',[LikeController::class,'update'])->name('like.update');
    Route::put('/dislike/{post}',[DislikeController::class,'update'])->name('dislike.update');
});

Route::group(['prefix' => '/dashboard','middleware' => 'auth'], function(){
    Route::get('/',[AdminController::class,'index'])->name('dashboard');

    Route::get('/users',[AdminUserController::class,'index'])->name('dashboard.users');
    Route::get('/users/{user}/edit',[AdminUserController::class,'edit'])->name('dashboard.users.edit');
    Route::put('/users/{user}',[AdminUserController::class,'update'])->name('dashboard.users.update');
    Route::delete('/users/{user}',[AdminUserController::class,'destroy'])->name('dashboard.users.delete');

    Route::get('/posts',[AdminPostController::class,'index'])->name('dashboard.posts');
    Route::get('/posts/{post}/edit',[AdminPostController::class,'edit'])->name('dashboard.posts.edit');
    Route::put('/posts/{post}',[AdminPostController::class,'update'])->name('dashboard.posts.update');
    Route::delete('/posts/{post}',[AdminPostController::class,'destroy'])->name('dashboard.posts.delete');
});

require __DIR__.'/auth.php';
