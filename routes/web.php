<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', [
    UserController::class,
    'index'
]);

Route::get('users/{user_id}', [
    UserController::class,
    'edit'
])->name('users.edit');

Route::post('users/{user_id}', [
    UserController::class,
    'update'
]);

Route::post('users', [
    UserController::class,
    'store'
]);
Route::delete('users/{user_id}', [
    UserController::class,
    'destroy'
])->name('users.destroy');