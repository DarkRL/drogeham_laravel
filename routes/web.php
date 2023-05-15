<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostTaskController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Admin\PageAdminController;
use App\Http\Controllers\Admin\HomePostController;
use App\Http\Controllers\Admin\NewsPostsController;
use App\Http\Controllers\Admin\MeydPostsController;
use App\Http\Controllers\Admin\HistoryPostController;
use App\Http\Controllers\Admin\PlaatselijkBelangPostController;
use App\Http\Controllers\imagehandler\ImageController;

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

Route::post('/upload/post-image', [PostTaskController::class, 'uploadImage'])
    ->name('upload.post.image');

Route::get('/', [PageController::class, 'homepage'])
    ->name('home');

Route::get('/home', [PageController::class, 'homepage'])
    ->name('home');

Route::get('/historie', [PageController::class, 'historypage'])
    ->name('historie');

Route::get('/actueel', [PageController::class, 'actueelpage'])
    ->name('actueel');

Route::get('/templates/{id}/newspost', [PageController::class, 'newspost'])
    ->name('templates.newspost');

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/admin/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

//Admin Home routes
Route::get('/admin/home/{id}/edit', [HomePostController::class, 'edit'])
    ->name('admin.home.edit')
    ->middleware('auth');

Route::patch('/admin/home/{id}/edit', [HomePostController::class, 'update'])
    ->middleware('auth');

Route::get('/admin/home/create', [HomePostController::class, 'create'])
    ->name('admin.home.create')
    ->middleware('auth');

Route::post('/admin/home/create', [HomePostController::class, 'store'])
    ->middleware('auth');

Route::get('/admin/home/index', [HomePostController::class, 'index'])
    ->name('admin.home.index')
    ->middleware('auth');
//


//Admin Actueel routes

Route::get('/admin/actueel/{id}/edit', [NewsPostsController::class, 'edit'])
    ->name('admin.actueel.edit')
    ->middleware('auth');

Route::get('/admin/actueel/{id}/delete', [NewsPostsController::class, 'delete'])
    ->name('admin.actueel.delete')
    ->middleware('auth');

Route::patch('/admin/actueel/{id}/edit', [NewsPostsController::class, 'update'])
    ->middleware('auth');

Route::get('/admin/actueel/create', [NewsPostsController::class, 'create'])
    ->name('admin.actueel.create')
    ->middleware('auth');

Route::post('/admin/actueel/create', [NewsPostsController::class, 'store'])
    ->middleware('auth');

Route::get('/admin/actueel/index', [NewsPostsController::class, 'index'])
    ->name('admin.actueel.index')
    ->middleware('auth');

    Route::put('/admin/actueel/{id}/publish', [NewsPostsController::class, 'publish'])
    ->name('admin.actueel.publish')
    ->middleware('auth');

//

//Admin meyd routes

Route::get('/admin/meyd/{id}/edit', [MeydPostsController::class, 'edit'])
    ->name('admin.meyd.edit')
    ->middleware('auth');

Route::get('/admin/meyd/{id}/delete', [MeydPostsController::class, 'delete'])
    ->name('admin.meyd.delete')
    ->middleware('auth');

Route::patch('/admin/meyd/{id}/edit', [MeydPostsController::class, 'update'])
    ->middleware('auth');

Route::get('/admin/meyd/create', [MeydPostsController::class, 'create'])
    ->name('admin.meyd.create')
    ->middleware('auth');

Route::post('/admin/meyd/create', [MeydPostsController::class, 'store'])
    ->middleware('auth');

Route::get('/admin/meyd/index', [MeydPostsController::class, 'index'])
    ->name('admin.meyd.index')
    ->middleware('auth');

    Route::put('/admin/meyd/{id}/publish', [MeydPostsController::class, 'publish'])
    ->name('admin.meyd.publish')
    ->middleware('auth');

//


//Admin History routes
Route::get('/admin/history/{id}/edit', [historyPostController::class, 'edit'])
    ->name('admin.history.edit')
    ->middleware('auth');

Route::patch('/admin/history/{id}/edit', [historyPostController::class, 'update'])
    ->middleware('auth');

Route::get('/admin/history/create', [historyPostController::class, 'create'])
    ->name('admin.history.create')
    ->middleware('auth');

Route::post('/admin/history/create', [historyPostController::class, 'store'])
    ->middleware('auth');

Route::get('/admin/history/index', [historyPostController::class, 'index'])
    ->name('admin.history.index')
    ->middleware('auth');
//

//Admin Plaatselijk belang routes
Route::get('/admin/plaatselijkbelang/{id}/edit', [PlaatselijkBelangPostController::class, 'edit'])
    ->name('admin.plaatselijkbelang.edit')
    ->middleware('auth');

Route::patch('/admin/plaatselijkbelang/{id}/edit', [PlaatselijkBelangPostController::class, 'update'])
    ->middleware('auth');

Route::get('/admin/plaatselijkbelang/create', [PlaatselijkBelangPostController::class, 'create'])
    ->name('admin.plaatselijkbelang.create')
    ->middleware('auth');

Route::post('/admin/plaatselijkbelang/create', [PlaatselijkBelangPostController::class, 'store'])
    ->middleware('auth');

Route::get('/admin/plaatselijkbelang/index', [PlaatselijkBelangPostController::class, 'index'])
    ->name('admin.plaatselijkbelang.index')
    ->middleware('auth');
//


Route::get('/admin/{admin}', [PageAdminController::class, 'index'])
    ->name("admin")
    ->middleware('auth');

Route::get('{page}', [PageController::class, 'index'])
    ->name("page");
