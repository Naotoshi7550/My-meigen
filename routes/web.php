<?php

use App\Http\Controllers\ProfileController;
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

// Default
// Route::get('/', function () {
//     return view('welcome');
// });


// Post
Route::get('/', \App\Http\Controllers\IndexController::class);
Route::get('/post/new', \App\Http\Controllers\Post\New\IndexController::class)->name('post.new.index');
Route::post('/post/new', \App\Http\Controllers\Post\PostCreateController::class)->middleware('auth')->name('post.new.create');
Route::get('/post/feature', \App\Http\Controllers\Post\Feature\IndexController::class)->name('post.feature.index');
Route::post('/post/feature', \App\Http\Controllers\Post\PostCreateController::class)->middleware('auth')->name('post.feature.create');

// Route::get('/register', \App\Http\Controllers\RegisterController::class);
// Route::get('/login', \App\Http\Controllers\LoginController::class);
// Route::get('/logout', \App\Http\Controllers\LogoutController::class);

Route::get('/post/{id}', \App\Http\Controllers\Post\PostDetailController::class)->name('post.detail');
Route::post('/post/{id}/like', \App\Http\Controllers\Post\LikeCreateController::class)->name('post.like');
Route::delete('/post/{id}/delete', \App\Http\Controllers\Post\PostDeleteController::class)->name('post.delete');
Route::get('/post/{id}/report', \App\Http\Controllers\Post\PostDetailController::class);

Route::get('/user/{id}', \App\Http\Controllers\User\IndexController::class)->name('user.top');
Route::get('/user/{id}/posts', \App\Http\Controllers\User\UserPostsController::class)->name('user.posts');
Route::get('/user/{id}/likes', \App\Http\Controllers\User\UserLikesController::class)->name('user.likes');
Route::get('/user/{id}/edit', \App\Http\Controllers\User\EditProfileController::class);
Route::get('/user/{id}/logout', \App\Http\Controllers\User\LogoutController::class)->name('user.logout');



// Auth
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
