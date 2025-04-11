<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('panel.index');
});



// Route::get('panel/users', [
//     UserController::class,
//     'index'
// ])->name('users');

// Route::get('users/{user_id}', [
//     UserController::class,
//     'edit'
// ])->name('users.edit');

// Route::post('users/{user_id}', [
//     UserController::class,
//     'update'
// ])->name('users.update');

// Route::post('users', [
//     UserController::class,
//     'store'
// ])->name('users.store');

// Route::delete('users/{user_id}', [
//     UserController::class,
//     'destroy'
// ])->name('users.destroy');


Route::resource('users', UserController::class)->only(['index', 'store', 'edit', 'update', 'destroy','create']);