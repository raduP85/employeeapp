<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeesController;

Route::apiResource('employees', EmployeesController::class);