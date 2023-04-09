<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceStatusController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\OrderStatusController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SearchController;

// Auth Routes
Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

// Account Routes
Route::resource('account', AccountController::class)->only(['index', 'create', 'store', 'update']);

// Resource Routes
Route::resource('home', HomeController::class)->only('index');
Route::resource('community', CommunityController::class)->only(['index', 'create', 'store', 'show']);
Route::resource('community.service', ServiceController::class)->only('create');
Route::resource('service', ServiceController::class)->except(['create', 'show', 'destroy']);
Route::resource('service.order', OrderController::class)->only('create');
Route::resource('order', OrderController::class)->except(['create', 'edit']);
Route::resource('order.file', FileController::class)->only(['index', 'create', 'store', 'show']);
Route::resource('queue', QueueController::class)->only('index');
Route::resource('order.payment', PaymentController::class)->only(['create']);
Route::resource('search', SearchController::class)->only('store');

// Custom Routes
Route::get('/', [IndexController::class, 'index']);
Route::put('approve/{order}', [OrderStatusController::class, 'approve']);
Route::put('reject/{order}', [OrderStatusController::class, 'reject']);
Route::put('cancel/{order}', [OrderStatusController::class, 'cancel']);
Route::put('printing/{order}', [OrderStatusController::class, 'printing']);
Route::put('complete/{order}', [OrderStatusController::class, 'completed']);
Route::put('pickup/{order}', [OrderStatusController::class, 'pickup']);
Route::put('open/{service}', [ServiceStatusController::class, 'open']);
Route::put('close/{service}', [ServiceStatusController::class, 'close']);
Route::put('service/{service}/change/{community}', [ServiceController::class, 'change']);
