<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ShortenerController;
use App\Http\Controllers\Admin\ExpanderController;

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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/link/{slug}', [LinkController::class, 'redir'])->name('link');

// Auth
Route::get('/register', [AuthController::class, 'create'])->name('register')->middleware('guest');
Route::post('/auth', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/auth/authenticate', [AuthController::class, 'authenticate']);

// admin 
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth');

// shorteners table
Route::get('/admin/shortener', [ShortenerController::class, 'index'])->name('shortener_index')->middleware('auth');

// expander table
Route::get('/admin/expander', [ExpanderController::class, 'index'])->name('expander_index')->middleware('auth');


