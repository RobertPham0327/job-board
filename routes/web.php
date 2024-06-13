<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CareerController;
use Illuminate\Support\Facades\Route;


Route::get('', fn() => to_route('jobs.index'));     // By default will be jump to this route

Route::resource('jobs', CareerController::class)->only(['index', 'show',]);
Route::get('login', fn() => to_route('auth.create'))->name('login');
Route::resource('auth', AuthController::class)->only(['index','create', 'store']);
Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');
