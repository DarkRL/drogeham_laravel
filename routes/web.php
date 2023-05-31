<?php

use App\Http\Controllers\admin\AgendaAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostTaskController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Admin\PageAdminController;
use App\Http\Controllers\Admin\HomePostController;
use App\Http\Controllers\Admin\NewsPostsController;
use App\Http\Controllers\Admin\ProjectPostController;
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

Route::controller(HomePostController::class)->group(function () {
    Route::get('/admin/home/index', 'index')->name('admin.home.index')->middleware('auth');
    Route::get('/admin/home/{id}/edit', 'edit')->name('admin.home.edit')->middleware('auth');
    Route::patch('/admin/home/{id}/edit', 'update')->middleware('auth');
    Route::get('/admin/home/create', 'create')->name('admin.home.create')->middleware('auth');

});

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/admin/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(NewsPostsController::class)->group(function () {
    Route::get('/admin/actueel/{id}/edit', 'edit')->name('admin.actueel.edit')->middleware('auth');
    Route::patch('/admin/actueel/{id}/edit', 'update')->middleware('auth');
    Route::get('/admin/actueel/create', 'create')->name('admin.actueel.create')->middleware('auth');
    Route::post('/admin/actueel/create', 'store')->middleware('auth');
    Route::get('/admin/actueel/{id}/delete', 'delete')->name('admin.actueel.delete')->middleware('auth');
    Route::put('/admin/actueel/{id}/publish', 'publish')->name('admin.actueel.publish')->middleware('auth');
    Route::get('/admin/actueel/index', 'index')->name('admin.actueel.index')->middleware('auth');
});

Route::controller(ProjectPostController::class)->group(function () {
    Route::get('/admin/projecten/{id}/edit', 'edit')->name('admin.projecten.edit')->middleware('auth');
    Route::patch('/admin/projecten/{id}/edit', 'update')->middleware('auth');
    Route::get('/admin/projecten/create', 'create')->name('admin.projecten.create')->middleware('auth');
    Route::post('/admin/projecten/create', 'store')->middleware('auth');
    Route::get('/admin/projecten/{id}/delete', 'delete')->name('admin.projecten.delete')->middleware('auth');
    Route::put('/admin/projecten/{id}/publish', 'publish')->name('admin.projecten.publish')->middleware('auth');
    Route::get('/admin/projecten/index', 'index')->name('admin.projecten.index')->middleware('auth');
});

Route::controller(MeydPostsController::class)->group(function () {
    Route::get('/admin/meyd/{id}/edit', 'edit')->name('admin.meyd.edit')->middleware('auth');
    Route::patch('/admin/meyd/{id}/edit', 'update')->middleware('auth');
    Route::get('/admin/meyd/create', 'create')->name('admin.meyd.create')->middleware('auth');
    Route::post('/admin/meyd/create', 'store')->middleware('auth');
    Route::get('/admin/meyd/{id}/delete', 'delete')->name('admin.meyd.delete')->middleware('auth');
    Route::put('/admin/meyd/{id}/publish', 'publish')->name('admin.meyd.publish')->middleware('auth');
    Route::get('/admin/meyd/index', 'index')->name('admin.meyd.index')->middleware('auth');
});

Route::controller(HistoryPostController::class)->group(function () {
    Route::get('/admin/history/{id}/edit', 'edit')->name('admin.history.edit')->middleware('auth');
    Route::patch('/admin/history/{id}/edit', 'update')->middleware('auth');
    Route::get('/admin/history/create', 'create')->name('admin.history.create')->middleware('auth');
    Route::post('/admin/history/create', 'store')->middleware('auth');
    Route::get('/admin/history/index', 'index')->name('admin.history.index')->middleware('auth');
});

Route::controller(PlaatselijkBelangPostController::class)->group(function () {
    Route::get('/admin/plaatselijkbelang/{id}/edit', 'edit')->name('admin.plaatselijkbelang.edit')->middleware('auth');
    Route::patch('/admin/plaatselijkbelang/{id}/edit', 'update')->middleware('auth');
    Route::get('/admin/plaatselijkbelang/create', 'create')->name('admin.plaatselijkbelang.create')->middleware('auth');
    Route::post('/admin/plaatselijkbelang/create', 'store')->middleware('auth');
    Route::get('/admin/plaatselijkbelang/index', 'index')->name('admin.plaatselijkbelang.index')->middleware('auth');
});


Route::post('/upload/post-image', [PostTaskController::class, 'uploadImage'])
    ->name('upload.post.image');

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'homepage')->name('home');
    Route::get('/home', 'homepage')->name('home');
    Route::get('/historie', 'historypage')->name('historie');
    Route::get('/plaatselijkbelang', 'plaatselijkbelangpage')->name('plaatelijkbelang');
    Route::get('/actueel', 'actueelpage')->name('actueel');
    Route::get('/templates/{id}/newspost', 'newspost')->name('templates.newspost');
    Route::get('/meyd/{pagename}', 'meydpost')->name('meyd.meydpost');
    Route::get('{page}', 'index')->name("page");
});

Route::controller(AgendaAdminController::class)->group(function () {
    Route::get('/admin/agenda/index', 'index')->name('admin.agenda.index')->middleware('auth');
    Route::post('/admin/agenda/fullcalendarAjax', 'ajax');
});
Route::get('/admin/{admin}', [PageAdminController::class, 'index'])->name('admin')->middleware('auth');
