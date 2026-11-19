<?php

use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/schedule', [ScheduleController::class, 'index']);
Route::post('/schedule', [ScheduleController::class, 'store']);
Route::post('/schedule/publish', [ScheduleController::class, 'publish']);
