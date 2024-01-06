<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;

// BARANG
Route::get('/', [Controller::class, 'BarangPage']);
Route::post('/barang', [BarangController::class, "Create"]);
Route::patch('/barang/{id}', [BarangController::class, "Update"]);
Route::delete('/barang/{id}', [BarangController::class, "Delete"]);

// CATEGORY
Route::get('/category', [Controller::class, 'CategoryPage']);
Route::post('/category', [CategoryController::class, 'Create']);
Route::patch('/category/{id}', [CategoryController::class, 'Update']);
Route::delete('/category/{id}', [CategoryController::class, 'Delete']);

// SUPPLIER
Route::get('/supplier', [Controller::class, 'SupplierPage']);
Route::post('/supplier', [SupplierController::class, 'Create']);
Route::patch('/supplier/{id}', [SupplierController::class, 'Update']);
Route::delete('/supplier/{id}', [SupplierController::class, 'Delete']);

// SUMMARY
Route::get('/audit', [Controller::class, 'AuditPage']);
