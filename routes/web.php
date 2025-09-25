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
Route::get('/admin/customer/view/{id}', [AdminController::class, 'viewCustomer']);
Route::post('/admin/customer/pay-due/{id}', [AdminController::class, 'payDue'])->name('customer.payDue');
Route::get('/admin/customer/delete/{id}', [AdminController::class, 'customerDelete']);