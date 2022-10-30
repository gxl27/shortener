<?php

use App\Http\Controllers\Api\LinkController;
use App\Http\Controllers\Api\ShortenerController;
use App\Http\Controllers\Api\ExpanderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/shortener', [ShortenerController::class, 'index'])->name('api_shortener')->middleware('guest');
Route::get('/expander', [ExpanderController::class, 'index'])->name('api_expander')->middleware('guest');
Route::get('/link', [LinkController::class, 'index'])->name('api_link')->middleware('guest');
Route::post('/link/{id}/update', [LinkController::class, 'update'])->name('api_link_update')->middleware('guest');