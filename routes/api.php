<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompanyApiController;
use App\Http\Controllers\EmployeeApiController;

Route::apiResource('/product', ProductController::class);
Route::apiResource('/company', CompanyApiController::class);
Route::apiResource('/employee', EmployeeApiController::class);

// Route::get('/product',[ProductController::class,'index']);
// Route::post('/product',[ProductController::class,'store']);
// Route::get('/product/{id}',[ProductController::class,'update']);
// Route::get('/product/{id}',[ProductController::class,'show']);
// Route::get('/product/{id}',[ProductController::class,'destroy']);
