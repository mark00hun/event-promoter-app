<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register',  [RegisterController::class, 'index'])->name('register');
        Route::post('/register', [RegisterController::class, 'register'])->name('register');

        /**
         * Login Routes
         */
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('login');
    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Home Routes
         */
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        /**
         * Logout Routes
         */
        Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    });
});
