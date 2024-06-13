<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\MyJobController;
use Illuminate\Support\Facades\Route;


Route::get('', fn() => to_route('jobs.index'));     // By default will be jump to this route

Route::resource('jobs', CareerController::class)->only(['index', 'show',]);
Route::get('login', fn() => to_route('auth.create'))->name('login');
Route::resource('auth', AuthController::class)->only(['index','create', 'store']);
Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');


// Job Application
Route::middleware('auth')->group(function() {
    Route::resource('job.application', JobApplicationController::class)->only(['create', 'store', 'destroy']);
    Route::resource('my-job-applications', MyJobApplicationController::class)->only(['index', 'show', 'destroy']);
    Route::resource('employer', EmployerController::class)->only(['create', 'store']);

    // Route::middleware('employer')->resource('my-jobs', MyJobController::class);
    Route::resource('my-jobs', MyJobController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
});
