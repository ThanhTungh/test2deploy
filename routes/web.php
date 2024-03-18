<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Website\WebsiteController;

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

// Login
Route::get('/', [AuthController::class, 'login_view'])->name('login');
Route::post('/login-submit', [AuthController::class, 'login_submit'])->name('login_submit');

// Register
Route::get('/register', [AuthController::class, 'register_view'])->name('register');
Route::post('/register-submit', [AuthController::class, 'register_submit'])->name('register_submit');

// Homepage
Route::get('/index', [WebsiteController::class, 'index_view'])->name('index');

// Edit profile
Route::get('/index/edit-profile', [WebsiteController::class, 'edit_profile_view'])->name('edit_profile');
Route::post('/index/edit-profile-submit', [WebsiteController::class, 'profile_submit'])->name('profile_submit');

// Logout
Route::get('/logout', [WebsiteController::class, 'logout'])->name('logout');