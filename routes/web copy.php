<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/post/new', \App\Http\Controllers\Post\New\IndexController::class)->name('post.new.index');
Route::post('/post/new', \App\Http\Controllers\Post\CreateController::class)->name('post.new.create');
Route::get('/post/feature', \App\Http\Controllers\Post\Feature\IndexController::class)->name('post.feature.index');
Route::post('/post/feature', \App\Http\Controllers\Post\CreateController::class)->name('post.feature.create');


Route::get('/register', \App\Http\Controllers\RegisterController::class);
Route::get('/login', \App\Http\Controllers\LoginController::class);
Route::get('/logout', \App\Http\Controllers\LogoutController::class);

Route::get('/post/{id}', \App\Http\Controllers\Post\PostDetailController::class)->name('post.detail');
Route::get('/post/{id}/report', \App\Http\Controllers\Post\ReportController::class);

Route::get('/user/{id}', \App\Http\Controllers\User\IndexController::class);
Route::get('/user/{id}/posts', \App\Http\Controllers\User\UserPostsController::class);
Route::get('/user/{id}/likes', \App\Http\Controllers\User\UserLikesController::class);
Route::get('/user/{id}/edit', \App\Http\Controllers\User\EditProfileController::class);