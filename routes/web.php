<?php

use App\Http\Controllers\CareerController;
use Illuminate\Support\Facades\Route;


Route::resource('jobs', CareerController::class);
