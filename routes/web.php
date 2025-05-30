<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
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


//Route::group(['prefix' => '/panel', 'middleware' => ['auth:web',\App\Http\LogUserActivity::class]], function () {
//    Route::view('/show', "panel.index")->name('panel1');
//    Route::get('/users/{user}/logs', [UserController::class, 'logs'])->name('logs');
//    Route::resource('users', UserController::class)->only(['index', 'store', 'edit', 'update', 'destroy', 'create']);
//    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
//
//});

//Route::group(['prefix' => '/panel', 'middleware' => ['auth:web', \App\Http\Middleware\LogUserActivity::class]], function () {
    Route::view('/show', "panel.index")->name('panel');
    Route::get('/users/{user}/logs', [UserController::class, 'logs'])->name('logs');
    Route::resource('users', UserController::class)->only(['index', 'store', 'edit', 'update', 'destroy', 'create']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('projects', ProjectController::class);
//});


Route::group(['middleware' => 'guest'], function () {
Route::view('login', "panel.login")->name('login');
Route::post('login', [AuthController::class,'doLogin'])->name('do.login');
});
