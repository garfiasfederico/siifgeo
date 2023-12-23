<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/crea-cuenta', [RegisterController::class,'index'])->name('cuenta.crear');
Route::post('/almacena-cuenta', [RegisterController::class,'store'])->name('cuenta.almacenar');


Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/logout',[LogoutController::class,'store'])->name('logout');
Route::post('/login',[LoginController::class,'store']);

Route::get('/{user:username}',[PostController::class,'index'])->name('posts.muro');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts/store',[PostController::class,'store'])->name('posts.store');
Route::delete('posts/{post}',[PostController::class,'destroy'])->name('posts.delete');

Route::get('/{user:username}/posts/{post}',[PostController::class,'show'])->name('posts.show');
Route::post('/{user:username}/posts/{post}',[ComentarioController::class,'store'])->name('comentario.store');

Route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');

Route::post('/posts/{post}/likes',[LikeController::class,'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes',[LikeController::class,'destroy'])->name('posts.likes.destroy');





