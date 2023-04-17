<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Admin\PageAdminController;
use App\Http\Controllers\Admin\HomePostController;

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

// Route::get('/', function (){

// }) ->name("home");

Route::get('/', function () {
    return view('pages/home');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/admin/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});


Route::get('/admin/home',[HomePostController::class, 'index']);

Route::get('/admin/{admin}',[PageAdminController::class, 'index'])
    ->name("admin");

Route::get('{page}',[PageController::class, 'index'])
    ->name("page");
