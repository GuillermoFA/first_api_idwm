<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('appointments', [\App\Http\Controllers\AppointmentController::class,'index']);

Route::post('appointments',[\App\Http\Controllers\AppointmentController::class,'store']);

Route::delete('appointments/{appointment}',[\App\Http\Controllers\AppointmentController::class,'destroy']);

Route::get('appointments/{appointment}',[\App\Http\Controllers\AppointmentController::class,'show']);

Route::put('/appointments/{appointment}', [\App\Http\Controllers\AppointmentController::class,'update']);
