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
    return view('posts.index');
});
Route::get('/home', function (){
    return view('home');
} )->name('home');

Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts');
Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store']);

Route::post('/logout', [\App\Http\Controllers\Auth\LogoutController::class, 'store'])->name('logout');

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class,'index'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'store']);


Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'store']);

Route::post('/posts/{post}/likes', [\App\Http\Controllers\PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes/delete', [\App\Http\Controllers\PostLikeController::class, 'destroy'])->name('posts.unlike');

Route::delete('/posts/{post}/delete',[\App\Http\Controllers\PostController::class,'destroy'])->name('post-delete');

Route::get('/profile/{user:username}/posts', [\App\Http\Controllers\UserPostController::class, 'index'])->name('profile');

//Route::get('/clear-cache', function() {
//    Artisan::call('cache:clear');
//    return "Cache is cleared";
//});

