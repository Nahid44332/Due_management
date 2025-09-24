<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [FrontendController::class, 'AdminLogin']);
Route::get('/logout', [FrontendController::class, 'AdminLogout']);
Auth::routes();

Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);
Route::get('/admin/add-customer', [AdminController::class, 'addCustomer']);
Route::post('/admin/add-customer/store', [AdminController::class, 'CustomerStore']);
Route::get('/admin/customer/list', [AdminController::class, 'CustomerList']); 