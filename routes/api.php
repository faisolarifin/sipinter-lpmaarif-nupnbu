<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SyncController;

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

Route::middleware('authverifytoken')->group(function() {
    Route::post('sync', [SyncController::class, 'bypassExistingData'])->name('sync.data');
});
