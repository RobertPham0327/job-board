<?php

use App\Http\Controllers\CareerController;
use Illuminate\Support\Facades\Route;


Route::get('', fn() => to_route('jobs.index'));     // By default will be jump to this route

Route::resource('jobs', CareerController::class)->only(['index', 'show',]);
