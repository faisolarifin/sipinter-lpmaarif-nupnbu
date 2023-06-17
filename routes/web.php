<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController,GeneralController};

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

Route::get('/', [GeneralController::class, 'homePage'])->name('home');
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
Route::get('/ceknpsn', [AuthController::class, 'cekNpsnPage'])->name('ceknpsn');
Route::get('/register/success', [AuthController::class, 'loginPage']);
