<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Admin\PageAdminController;
use App\Http\Controllers\Admin\HomePostController;
use App\Http\Controllers\Admin\NewsPostsController;

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

//Admin Home routes
Route::get('/admin/home/{id}/edit', [HomePostController::class, 'edit'])
    ->name('admin.home.edit');

Route::patch('/admin/home/{id}/edit', [HomePostController::class, 'update']);

Route::get('/admin/home/create', [HomePostController::class, 'create'])
    ->name('admin.home.create');

Route::post('/admin/home/create', [HomePostController::class, 'store']);

Route::get('/admin/home/index',[HomePostController::class, 'index']);
//


//Admin Actueel routes

Route::get('/admin/actueel/{id}/edit', [HomePostController::class, 'edit'])

    ->name('admin.actueel.edit');

Route::patch('/admin/actueel/{id}/edit', [NewsPostsController::class, 'update']);

Route::get('/admin/actueel/create', [NewsPostsController::class, 'create'])
    ->name('admin.actueel.create');

Route::post('/admin/actueel/create', [NewsPostsController::class, 'store']);

Route::get('/admin/actueel/index',[NewsPostsController::class, 'index']);
//


Route::get('/admin/{admin}',[PageAdminController::class, 'index'])
    ->name("admin");

Route::get('{page}',[PageController::class, 'index'])
    ->name("page");
