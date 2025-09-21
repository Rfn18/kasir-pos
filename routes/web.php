<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::get('/', [UserController::class, 'index'])->name('users.index');

Route::get('users', [UserController::class, 'create'])->name('users.create');