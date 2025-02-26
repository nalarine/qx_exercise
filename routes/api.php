<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::post('/companies', [CompanyController::class, 'store']);
Route::controller(CompanyController::class)->group(function () {
    Route::get('/companies', 'index');
    Route::get('/companies/{id}', 'show');
    Route::post('/companies', 'store');
    Route::put('/companies/{id}', 'update');
    Route::delete('/companies/{id}', 'destroy');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/employees', 'index');
        Route::get('/employees/{id}', 'show');
        Route::post('/employees', 'store');
        Route::put('/employees/{id}', 'update');
        Route::delete('/employees/{id}', 'destroy');
    });
});

