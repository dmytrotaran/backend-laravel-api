<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PreferenceController;

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


// REGISTER USER ROUTE
Route::post('/register', [AuthController::class, 'register']);

// LOGIN USER ROUTE
Route::post('/login', [AuthController::class, 'login']);

// PROTECTED ROUTES GROUP
Route::group(['middleware' => ['auth:sanctum']], function() {
    // GET USER ROUTE
    Route::get('/user', [AuthController::class, 'getUser']);
    
    // LOGOUT USER ROUTE
    Route::post('/logout', [AuthController::class, 'logout']);

    // CREATE PREFERENCE ROUTE
    Route::post('/preference', [PreferenceController::class, 'createPreference']);

    // GET PREFERENCE ROUTE
    Route::get('/preference', [PreferenceController::class, 'getPreference']);
});