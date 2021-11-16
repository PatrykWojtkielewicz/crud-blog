<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/new_post',[PostController::class,'create'])->name('new_post');
Route::post('/add_post', [PostController::class,'store'])->name('add_post');

Route::get('/login/create', [LoginController::class, 'create'])->name('login.create');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/registration/create', [RegisterController::class, 'create'])->name('registration.create');
Route::post('/registration', [RegisterController::class, 'store'])->name('registration.store');

