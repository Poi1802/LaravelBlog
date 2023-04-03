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

Route::name('admin.')->prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function () {
  Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
  });
  Route::group(['namespace' => 'Category'], function () {
    Route::get('/categories', 'IndexController')->name('main.index');
  });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');