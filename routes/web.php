<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;

 Route::get('/', function () {
     return view('welcome');
 });


// Route::get('/', function () {
//     return view('panel.index');
// });



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

// Route::group(['prefix'=>'panel','middleware'=>'auth:web'])(function () {
//     Route::resource('users', UserController::class)->only(['index', 'store', 'edit', 'update', 'destroy','create']);
//     Route::get('logout',[AuthController::class,'logout'])->name('logout');
//     Route::view('/', "panel.index")->name('panel');
// });


Route::group(['prefix' => '/panel', 'middleware' => 'auth:web'], function () {
    Route::view('/show', "panel.index")->name('panel1');
    Route::resource('users', UserController::class)->only(['index', 'store', 'edit', 'update', 'destroy', 'create']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::group(['middleware' => 'guest'], function () {
Route::view('login', "panel.login")->name('login');
Route::post('login', [AuthController::class,'doLogin'])->name('do.login');

});
