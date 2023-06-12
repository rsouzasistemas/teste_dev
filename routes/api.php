<?php

use App\Http\Controllers\Api\CitiesController;
use App\Http\Controllers\Api\StatesController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/users', [UserController::class, 'index'])->name('index');
Route::post('/users', [UserController::class, 'index'])->name('index');
Route::post('users/store', [UserController::class, 'store'])->name('store');
Route::put('users/update/{id}', [UserController::class, 'update'])->name('update');
Route::delete('users/delete/{id}', [UserController::class, 'destroy'])->name('delete');

Route::get('/states', [StatesController::class, 'index'])->name('index');
Route::get('/cities/{stateId?}', [CitiesController::class, 'index'])->name('index');