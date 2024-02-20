<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BorrowController;

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
//show all books
Route::get('/', [BookController::class, 'index'])->name('home');

//show all users
Route::get('/users', [UserController::class, 'index']);

//show login form
//only guest can access this route change also the RouteServiceProvider
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//show register form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

//register user
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

//login user
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');

//logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


//add a borrowed book
Route::post('/book/{id}', [BorrowController::class, 'borrow'])->middleware('auth');

//show single book
Route::get('/book/{id}', [BookController::class, 'show'])->middleware('auth');

//remove the borrowed book
Route::delete('/book/{id}/return', [BorrowController::class, 'unborrow'])->middleware('auth');

//delete a user
Route::delete('/user/{id}', [UserController::class, 'destroy'])->middleware('auth');

//delete a book
Route::delete('/book/{id}', [BookController::class, 'destroy'])->middleware('auth');

//show edit book form
Route::get('/book/{id}/edit', [BookController::class, 'viewEdit'])->middleware('auth');

//show edit book form
Route::put('/book/{id}/', [BookController::class, 'edit'])->middleware('auth');

//show add/list book form
Route::get('/book', [BookController::class, 'viewCreate'])->middleware('auth');

// add/list a book 
Route::post('/addbook', [BookController::class, 'create'])->middleware('auth');

// show borrowed books of user
Route::get('/books', [BorrowController::class, 'indexBooks'])->middleware('auth');
