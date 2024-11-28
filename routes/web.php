<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', [EmployeeController::class, 'index'])->name('welcome');
Route::get('/create', [EmployeeController::class, 'create'])->name('create');
Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('edit');
Route::resource('employees', EmployeeController::class);
