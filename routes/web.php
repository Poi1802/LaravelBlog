<?php

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

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
  Route::get('/', 'IndexController')->name('main.index');
});

Route::name('admin.')->prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware(['auth', 'admin', 'verified'])->group(function () {
  Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
  });

  Route::name('posts.')->prefix('posts')->namespace('Post')->group(function () {
    Route::get('/', 'IndexController')->name('index');
    Route::get('/create', 'CreateController')->name('create');
    Route::post('/', 'StoreController')->name('store');
    Route::get('/{post}', 'ShowController')->name('show');
    Route::get('/{post}/edit', 'EditController')->name('edit');
    Route::patch('/{post}', 'UpdateController')->name('update');
    Route::delete('/{post}', 'DestroyController')->name('destroy');
  });

  Route::name('users.')->prefix('users')->namespace('User')->group(function () {
    Route::get('/', 'IndexController')->name('index');
    Route::get('/create', 'CreateController')->name('create');
    Route::post('/', 'StoreController')->name('store');
    Route::get('/{user}/edit', 'EditController')->name('edit');
    Route::patch('/{user}', 'UpdateController')->name('update');
    Route::delete('/{user}', 'DestroyController')->name('destroy');
  });

  Route::name('categories.')->prefix('categories')->namespace('Category')->group(function () {
    Route::get('/', 'IndexController')->name('index');
    Route::get('/create', 'CreateController')->name('create');
    Route::post('/', 'StoreController')->name('store');
    Route::get('/{category}/edit', 'EditController')->name('edit');
    Route::patch('/{category}', 'UpdateController')->name('update');
    Route::delete('/{category}', 'DestroyController')->name('destroy');
  });

  Route::name('tags.')->prefix('tags')->namespace('Tag')->group(function () {
    Route::get('/', 'IndexController')->name('index');
    Route::get('/create', 'CreateController')->name('create');
    Route::post('/', 'StoreController')->name('store');
    Route::get('/{tag}/edit', 'EditController')->name('edit');
    Route::patch('/{tag}', 'UpdateController')->name('update');
    Route::delete('/{tag}', 'DestroyController')->name('destroy');
  });
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');