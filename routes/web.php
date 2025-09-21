<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'AdminLogin']);
Auth::routes();

Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);