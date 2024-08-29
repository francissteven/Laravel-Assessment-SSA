<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    
    Route::get('/dashboard/add', [UserController::class, 'create'])->name('users.create');
    Route::post('/dashboard/add', [UserController::class, 'store'])->name('users.store');
    Route::get('/dashboard/{user}', [UserController::class, 'view'])->name('users.view');
    Route::get('/dashboard/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/dashboard/edit/{user}', [UserController::class, 'update'])->name('users.update');

    Route::delete('/dashboard/{user}', [UserController::class, 'destroy'])->name('users.destroy'); //softdelete

    Route::post('/dashboard/restore/{id}', [UserController::class, 'restore'])->name('users.restore'); //restore

    Route::post('/dashboard/delete/{id}', [UserController::class, 'delete'])->name('users.delete'); //force delete

    Route::get('/trashed', [UserController::class, 'trashed'])->name('users.trashed'); //trashed
});

