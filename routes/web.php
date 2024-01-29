<?php

use App\Http\Controllers\{
    RegisterController,
    LoginController,
    LogoutController,
    UserController
};
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
    return view('home');
})->name('home');

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login']);


Route::middleware('auth')->group(function () {
    
    Route::get('/logout', [LogoutController::class, 'logout']);
    
    Route::get('/profile', [UserController::class, 'showProfile'])->name('users.profile');
    Route::patch('/users/update-profile', [UserController::class, 'updateProfile'])->name('users.updateProfile');
    Route::patch('/users/update-password', [UserController::class, 'updatePassword'])->name('users.updatePassword');

    Route::patch('/users/{id}/restore', [UserController::class, 'restoreUser'])->name('users.restore');
    
    Route::get('/new-user', function () {
        return view('users.userNew');
    })->name('user.new');

    Route::resource('/users', UserController::class);
});