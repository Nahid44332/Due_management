<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [FrontendController::class, 'AdminLogin']);
Route::get('/logout', [FrontendController::class, 'AdminLogout']);
Auth::routes();

Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);