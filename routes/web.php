<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\RevenueController;
use Illuminate\Support\Facades\Route;

// TODO: Acordarse que los names son mas para ser usados en los href para no poner la ruta completa de la misma

// NOTE: Rutas para helper
Route::get('/', [Controller::class, 'index'])->name('index');

// NOTE: Rutas para categorias
Route::get('/categories/index', [CategoryController::class, 'index'])->name('category');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categoryCreate');
Route::get('/categories/edit/{id}',[CategoryController::class, 'edit'])->name('categoryEdit');
Route::delete('/categories/delete/{id}',[CategoryController::class, 'delete'])->name('categoryDelete');
Route::post('/categories/update',[CategoryController::class,'update'])->name('categoryUpdate');
Route::post('/categories/save', [CategoryController::class, 'save'])->name('categorySave');

// NOTE: Rutas para gastos
Route::get('/expenses/index',[ExpenseController::class, 'index'])->name('expense');
Route::get('/expenses/create',[ExpenseController::class, 'create'])->name('expenseCreate');
Route::get('/expenses/edit/{id}',[ExpenseController::class, 'edit'])->name('expenseEdit');
Route::delete('/expenses/delete/{id}',[ExpenseController::class, 'delete'])->name('expenseDelete');
Route::post('/expenses/update',[ExpenseController::class,'update'])->name('expenseUpdate');
Route::post('/expenses/save', [ExpenseController::class, 'save'])->name('expenseSave');

// NOTE: Rutas para ingresos
Route::get('/revenues/index',[RevenueController::class, 'index'])->name('revenue');
Route::get('/revenues/create',[RevenueController::class, 'create'])->name('revenueCreate');
Route::get('/revenues/edit/{id}',[RevenueController::class, 'edit'])->name('revenueEdit');
Route::delete('/revenues/delete/{id}',[RevenueController::class, 'delete'])->name('revenueDelete');
Route::post('/revenues/update',[RevenueController::class,'update'])->name('revenueUpdate');
Route::post('/revenues/save', [RevenueController::class, 'save'])->name('revenueSave');

// NOTE: Rutas para filtros
Route::get('/filters/date',[FilterController::class, 'date'])->name('obtainDate');
Route::post('/filters/table',[FilterController::class, 'filter'])->name('filterDate');