<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashBoardController as AdminController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingsController;
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

Route::get('/post/{post}',[PostController::class, 'index'])->name('post.show');
Route::get('/post/{post}#comments',[PostController::class, 'index'])->name('post.show.comment');

Route::group(['middleware' => 'auth'], function(){
    Route::post('/comment/add',[CommentController::class, 'store'])->name('comment.add');
    Route::post('/comment/delete',[CommentController::class, 'destroy'])->name('comment.delete');
    Route::get('/settings',[SettingsController::class,'index'])->name('settings');
    Route::get('/new_post',[PostController::class,'create'])->name('new_post');
    Route::post('/add_post',[PostController::class,'store'])->name('add_post');
});

Route::group(['prefix' => '/dashboard','middleware' => 'auth'], function(){
    Route::get('/users',[AdminUserController::class,'index'])->name('dashboard.users');
    Route::get('/choose_user',[AdminUserController::class,'create'])->name('dashboard.users.choose');
    Route::post('/update_user',[AdminUserController::class,'update'])->name('dashboard.users.update');
    Route::post('/show_user',[AdminUserController::class,'show'])->name('dashboard.users.show_user');

    Route::get('/posts',[AdminPostController::class,'index'])->name('dashboard.posts');
    Route::post('/update_post',[AdminPostController::class,'create'])->name('dashboard.posts.update');
    Route::post('/edit',[AdminPostController::class,'store'])->name('dashboard.posts.edit');
    Route::get('/',[AdminController::class,'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
