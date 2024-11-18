<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('employees', EmployeesController::class);