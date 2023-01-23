<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::controller(HomeController::class)->group(
    function () {
        Route::get('/', 'index')->name('home');
        Route::get('/public', 'public')->name('public-page');
        Route::get('/protected', 'protected')->name('protected-page');
    }
);

Route::controller(AuthController::class)->group(
    function () {
        Route::get('/login', 'login')->name('login');
        Route::get('/logout', 'logout')->name('logout');
        Route::get('/register', 'register')->name('register');
        Route::get('/auth/verification', 'verificationNotice')->name('verification.notice');
        Route::get('/auth/verification/{id}/{hash}', 'verificationVerify')->name('verification.verify');
        Route::post('/auth/verification-send', 'verificationSend')->name('verification.send');
    }
);

Route::controller(AdminController::class)->group(
    function () {
        Route::prefix('/admin')->group(
            function () {
                Route::get('/', 'index')->name('admin');
                Route::get('/monitor', 'monitor')->name('admin-monitor');
            }
        );
    }
);
