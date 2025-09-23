<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::get('/', [UserController::class, 'index'])->name('users.index');

Route::get('users', [UserController::class, 'create'])->name('users.create');

Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

Route::delete('user/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::post('users', [UserController::class, 'store'])->name('users.store');

Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
