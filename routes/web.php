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
use App\Http\Controllers\Admin\BrinkpraatPostController;
use App\Http\Controllers\Admin\PlaatselijkBelangPostController;
use App\Http\Controllers\imagehandler\ImageController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/admin/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
});

Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('forget-password', 'showForgetPasswordForm')->name('forget.password.get');
    Route::post('forget-password', 'submitForgetPasswordForm')->name('forget.password.post');
    Route::get('reset-password/{token}', 'showResetPasswordForm')->name('reset.password.get');
    Route::post('reset-password', 'submitResetPasswordForm')->name('reset.password.post');
});


Route::controller(NewsPostsController::class)->group(function () {
    Route::get('/admin/actueel/{id}/edit', 'edit')->name('admin.actueel.edit')->middleware('auth');
    Route::patch('/admin/actueel/{id}/edit', 'update')->middleware('auth');
    Route::get('/admin/actueel/create', 'create')->name('admin.actueel.create')->middleware('auth');
    Route::post('/admin/actueel/create', 'store')->middleware('auth');
    Route::put('/admin/actueel/{id}/delete', 'delete')->name('admin.actueel.delete')->middleware('auth');
    Route::put('/admin/actueel/{id}/publish', 'publish')->name('admin.actueel.publish')->middleware('auth');
    Route::get('/admin/actueel/index', 'index')->name('admin.actueel.index')->middleware('auth');
});

Route::controller(ProjectPostController::class)->group(function () {
    Route::get('/admin/projecten/{id}/edit', 'edit')->name('admin.projecten.edit')->middleware('auth');
    Route::patch('/admin/projecten/{id}/edit', 'update')->middleware('auth');
    Route::get('/admin/projecten/create', 'create')->name('admin.projecten.create')->middleware('auth');
    Route::post('/admin/projecten/create', 'store')->middleware('auth');
    Route::put('/admin/projecten/{id}/delete', 'delete')->name('admin.projecten.delete')->middleware('auth');
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

Route::controller(BrinkpraatPostController::class)->group(function () {
    Route::get('/admin/brinkpraat/{id}/edit', 'edit')->name('admin.brinkpraat.edit')->middleware('auth');
    Route::patch('/admin/brinkpraat/{id}/edit', 'update')->middleware('auth');
    Route::get('/admin/brinkpraat/create', 'create')->name('admin.brinkpraat.create')->middleware('auth');
    Route::post('/admin/brinkpraat/create', 'store')->middleware('auth');
    Route::get('/admin/brinkpraat/index', 'index')->name('admin.brinkpraat.index')->middleware('auth');

    Route::get('/admin/brinkpraat/files/{id}/edit', 'edit_files')->name('admin.brinkpraat.edit.files')->middleware('auth');
    Route::patch('/admin/brinkpraat/files/{id}/edit', 'update_files')->middleware('auth');
    Route::get('/admin/brinkpraat/files/create', 'create_files')->name('admin.brinkpraat.create.files')->middleware('auth');
    Route::post('/admin/brinkpraat/files/create', 'store_files')->middleware('auth');
    Route::put('/admin/brinkpraat/{id}/publish', 'publish_files')->name('admin.brinkpraat.publish.files')->middleware('auth');
    Route::put('/admin/brinkpraat/{id}/delete', 'delete_files')->name('admin.brinkpraat.delete.files')->middleware('auth');
});

Route::controller(PlaatselijkBelangPostController::class)->group(function () {
    Route::get('/admin/plaatselijkbelang/{id}/edit', 'edit')->name('admin.plaatselijkbelang.edit')->middleware('auth');
    Route::patch('/admin/plaatselijkbelang/{id}/edit', 'update')->middleware('auth');
    Route::get('/admin/plaatselijkbelang/create', 'create')->name('admin.plaatselijkbelang.create')->middleware('auth');
    Route::post('/admin/plaatselijkbelang/create', 'store')->middleware('auth');
    Route::get('/admin/plaatselijkbelang/index', 'index')->name('admin.plaatselijkbelang.index')->middleware('auth');
});

Route::controller(AgendaAdminController::class)->group(function () {
    Route::get('/admin/agenda/index', 'index')->name('admin.agenda.index')->middleware('auth');
    Route::post('/admin/agenda/create', 'create')->name('admin.agenda.create')->middleware('auth');
    Route::post('/admin/agenda/store', 'store')->name('admin.agenda.store')->middleware('auth');
    Route::post('/admin/agenda/edit/{id}', 'edit')->name('admin.agenda.edit')->middleware('auth');
    Route::patch('/admin/agenda/update/{id}', 'update')->name('admin.agenda.update')->middleware('auth');
    // Route::put('/admin/agenda/delete/{id}', 'delete')->name('admin.agenda.delete')->middleware('auth');
    Route::put('/admin/agenda/delete', 'delete')->name('admin.agenda.delete')->middleware('auth');
    Route::post('/admin/agenda/eventdragajax/{id}', 'eventdragajax')->name('admin.agenda.eventdragajax')->middleware('auth');
    Route::post('/admin/agenda/eventajax/{id}', 'eventajax')->name('admin.agenda.eventajax')->middleware('auth');
});

Route::post('/upload/post-image', [PostTaskController::class, 'uploadImage'])
    ->name('upload.post.image');

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'homepage')->name('home');
    Route::get('/home', 'homepage')->name('home');
    Route::get('/historie', 'historypage')->name('historie');
    Route::get('/plaatselijkbelang', 'plaatselijkbelangpage')->name('plaatelijkbelang');
    Route::get('/actueel', 'actueelpage')->name('actueel');
    Route::get('/agenda', 'agendapage')->name('agenda');
    Route::post('/eventajax/{id}', 'eventajax')->name('eventajax');
    Route::get('/templates/{id}/newspost', 'newspost')->name('templates.newspost');
    Route::get('/projecten', 'projectenpage')->name('projecten');
    Route::get('/brinkpraat', 'brinkpraatpage')->name('brinkpraat');
    Route::get('/templates/{id}/projectpost', 'projectpost')->name('templates.projectpost');
    Route::get('/meyd/{pagename}', 'meydpost')->name('meyd.meydpost');
    Route::get('{page}', 'index')->name("page");
    Route::post('/contact/post', 'contactSumbit')->name("contact post");
});


Route::get('/admin/{admin}', [PageAdminController::class, 'index'])->name('admin')->middleware('auth');
