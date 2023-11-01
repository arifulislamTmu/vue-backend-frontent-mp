<?php
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;


Route::get("/api/user/", [UserController::class, "index"]);
Route::post("/api/create-user/", [UserController::class, "createUser"]);

//employee route
Route::post("/api/employee/", [EmployeeController::class, "store"]);
Route::get("/api/employee-list/", [EmployeeController::class, "employee_list"]);
Route::get("/api/employee-delete/{id}", [EmployeeController::class, "employee_delete"]);
Route::get("/api/edit-employee/{id}", [EmployeeController::class, "employee_edit"]);
Route::post("/api/employee/update/{id}", [EmployeeController::class, "employee_update"]);

//Supplier route
Route::resource("supplier", SupplierController::class);

//Category route
Route::resource("category", CategoryController::class);

Route::get('{any}', ApplicationController::class)->where('any', '.*');


