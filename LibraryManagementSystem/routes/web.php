<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

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



Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.adminIndex');
Route::get('/admin/create', [AdminController::class, 'create'])->middleware('auth')->name('admin.adminCreate');
Route::post('/admin', [AdminController::class, 'store'])->name('admin.adminStore')->middleware(['auth', 'admin']);
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy')->middleware(['auth', 'admin']);
Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.adminUsers')->middleware(['auth', 'admin']);
Route::post('/admin/users/{id}', [AdminController::class, 'destroyUsers'])->name('admin.destroyUsers')->middleware(['auth', 'admin']);
Route::get('/admin/{id}/update', [AdminController::class, 'update'])->name('admin.adminUpdate')->middleware(['auth', 'admin']);
Route::patch('/admin/{id}/update', [AdminController::class, 'patch'])->name('admin.adminUpdateBook')->middleware(['auth', 'admin']);

// Route::get('/borrows', [AdminController::class, 'showBorrows'])->name('admin.borrows');

// Route::delete('/home/delete/{id}', [HomeController::class, 'destroy'])->name('borrow.destroy')->middleware('auth');


// Route::post('/home/create', [HomeController::class, 'create'])->middleware(['auth', 'admin'])->name('home.create');
Route::post('/home', [HomeController::class, 'store'])->middleware('auth')->name('book.store');
// Route::get('/home', [HomeController::class, 'show'])->middleware(['auth', 'admin'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::get('post', [HomeController::class, 'post'])->middleware(['auth', 'admin']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
