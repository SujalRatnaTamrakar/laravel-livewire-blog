<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class,'index'])->name('home');


Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts/create', [PostController::class,'create'])->name('post.create');
    Route::get('/post/edit/{post:id}', [PostController::class,'edit'])->name('post.edit');
    Route::post('/posts', [PostController::class,'store'])->name('post.store');
    Route::patch('/post/{post:id}', [PostController::class,'update'])->name('post.update');
    Route::delete('/post/{post:id}', [PostController::class,'destroy'])->name('post.destroy');
    Route::get('/posts/export', [PostController::class, 'export'])->name('posts.export');
    Route::post('/posts/import', [PostController::class, 'import'])->name('posts.import');
});

Route::get('/posts/{post:slug}', [PostController::class,'show'] );

require __DIR__.'/auth.php';
