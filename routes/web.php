<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    return response()->json([
        'API Name' => 'Tedy Hidayat - Backend Test - IMP Studio',
        'version' => '1.0.0'
    ], 200);
});

// grouping middleware API Jwt
Route::group([
    'middleware' => 'api'
], function ($router) {

    // Authentication
    Route::group([
        'prefix' => 'auth'  
    ], function ($router) {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('signup', [AuthController::class, 'register']);
    });
    
    // users data
    Route::group([
        'middleware' => 'auth:api',
        'prefix' => 'user'  
    ], function ($router) {
        Route::get('userlist', [UserController::class, 'index']);
        Route::get('/{id}', [UserController::class, 'getById']);
    });

});