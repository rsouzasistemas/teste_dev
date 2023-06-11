<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Rotas identificadas individualmente
Route::name('users.')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('index');
    Route::post('/users', [UserController::class, 'index'])->name('index');
    Route::get('users/create/', [UserController::class, 'create'])->name('create');
    Route::post('users/store', [UserController::class, 'store'])->name('store');
    Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::put('users/update/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('users/delete/{id}', [UserController::class, 'destroy'])->name('delete');
});