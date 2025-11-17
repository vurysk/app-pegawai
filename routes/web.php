<?php

use App\Models\Salaries;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SalariesController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DepartmentController;


Route::get('/', function () {
    return view('hello');
});

Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('positions',PositionController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('salaries', SalariesController::class);
Route::resource('rooms', RoomController::class);







