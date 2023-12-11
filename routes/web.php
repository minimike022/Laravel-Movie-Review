<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ReviewsController;


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

Route::resource('users', UserController::class);
Route::resource('movies', MoviesController::class);
Route::resource('reviews', ReviewsController::class);
Route::get('/', [UserController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'usertype:admin'])->group(function() {
    Route::get('/admin', [adminController::class, 'adminIndex']);
});
Route::middleware(['auth', 'usertype:user'])->group(function() { 
    Route::get('/user/userInfoForms', [UserController::class, 'userInfoForms']);
    Route::get('/user/reviews', [UserController::class, 'userReviews']);
});

Route::get('/adminlogout', [adminController::class, 'destroy']);
Route::get('/userLogout', [UserController::class, 'logout']);
Route::get('/movies/viewMovies/{id}', [MoviesController::class, 'viewMovies']);


