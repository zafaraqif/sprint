<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QueueController;
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

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('account', AccountController::class);


Route::get('/', [IndexController::class, 'index']);
Route::resource('home', HomeController::class);
Route::resource('community', CommunityController::class)->only(['index', 'create', 'store']);
Route::resource('service', ServiceController::class);
Route::resource('order', OrderController::class)->except(['edit', 'update']);
Route::resource('order.file', FileController::class)->only(['create', 'store']);
Route::get('profile', [ProfileController::class, 'index']);
Route::resource('queue', QueueController::class);
