<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;
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


// Pages
Route::get('/', [BookController::class, 'books']);

// Books
Route::get('/books', [BookController::class, 'books'])->name('books');

Route::get('/dashboard/books', [BookController::class, 'index'])->name('dashboard.books')->middleware('is_admin');

Route::get('/users', [UserController::class, 'index'])->middleware('is_admin');

Route::get('/books/{id}', [BookController::class, 'show']);

Route::get('dashboard/books/create', [BookController::class, 'create'])->middleware('is_admin');

Route::post('/books/new', [BookController::class, 'store'])->middleware('is_admin');

Route::get('dashboard/books/{id}/edit', [BookController::class, 'edit'])->middleware('is_admin');

Route::put('/books/{id}/update', [BookController::class, 'update'])->middleware('is_admin');

Route::put('/books/{id}', [BookController::class, 'archive'])->middleware('is_admin');

Route::post('books/like', [BookController::class, 'like'])->middleware('auth');

Route::post('books/dislike', [BookController::class, 'dislike'])->middleware('auth');

Route::post('books/addToFavourites', [BookController::class, 'addToFavourites'])->middleware('auth');

Route::delete('favourites/remove', [BookController::class, 'remove'])->name('remove')->middleware('auth');

// Groups
Route::get('/groups', [GroupController::class, 'index'])->name('groups');

Route::get('/groups/{id}', [GroupController::class, 'show'])->middleware('auth');

Route::post('/groups/join', [GroupController::class, 'join'])->name('join')->middleware('auth');

Route::delete('/groups/remove', [GroupController::class, 'destroy'])->middleware('auth');

Route::get('/new', [GroupController::class, 'create'])->middleware('auth');

Route::post('/add', [GroupController::class, 'store'])->middleware('auth');

Route::post('/comment', [GroupController::class, 'comment'])->middleware('auth');


// Categories
Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('dashboard.categories')->middleware('is_admin');

Route::get('/dashboard/categories/create', [CategoryController::class, 'create'])->middleware('is_admin');

Route::post('/categories/new', [CategoryController::class, 'store'])->middleware('is_admin');

Route::put('/categories/{id}/update', [CategoryController::class, 'update'])->middleware('is_admin');

Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->middleware('is_admin');

// Users
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::get('/login', [UserController::class, 'show'])->name('login')->middleware('guest');

Route::post('/users/register', [UserController::class, 'store']);

Route::post('/users/login', [UserController::class, 'login']);

Route::post('/users/logout', [UserController::class, 'logout']);

Route::get('/profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');;

Route::put('/profile/update', [UserController::class, 'update']);
