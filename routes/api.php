<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('users', UserController::class);// ->middleware(['auth:sanctum', 'abilities:check-status,place-orders']); #middleware for authenticating users routes

/**
 * 
 *  #### CRUD (create, read, update e delete) da tabela usuários (users) -> README.md
 * 
 */

// Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
// Route::post('/users', [UserController::class, 'store'])->name('users.store');
// Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
// Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::resource('posts', PostController::class);// ->middleware(['auth:sanctum', 'abilities:check-status,place-orders']); #middleware for authenticating posts routes
Route::post('/posts/{post}/tags', [PostController::class, 'storeMany'])->name('posts.storeMany');

/**
 * 
 *  #### CRUD (create, read, update e delete) da tabela usuários (posts) -> README.md
 * 
 */

// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
// Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::resource('tags', TagController::class);// ->middleware(['auth:sanctum', 'abilities:check-status,place-orders']); #middleware for authenticating tags routes

/**
 * 
 *  #### CRUD (create, read, update e delete) da tabela usuários (tags) -> README.md
 * 
 */

// Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
// Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');
// Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
// Route::put('/tags/{tag}', [TagController::class, 'update'])->name('tags.update');
// Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');
