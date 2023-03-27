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

Route::get('/', function () {
    return view('home');
});

Route::get('/agenda', function () {
    return view('pages/agenda');
});

Route::get('/actueel', function () {
    return view('pages/actueel');
});

Route::get('/plaatselijkbelang', function () {
    return view('pages/plaatselijkbelang');
});

Route::get('/brinkpraat', function () {
    return view('pages/brinkpraat');
});

Route::get('/historie', function () {
    return view('pages/historie');
});

Route::get('/login', function () {
    return view('pages/login');
});
