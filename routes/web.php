<?php
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\EmployeeSalaryController;
use App\Http\Controllers\Api\ExpanceController;
use App\Http\Controllers\Api\ExpanseController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\DB;

Route::get('/test', function (){
    $id = 1;
    $salary_edit = DB::table('employee_salaries')
    ->join('employees', 'employee_salaries.employee_id', 'employees.id')
    ->select('employee_salaries.*','employees.*')
    ->where('employee_salaries.id', $id)->get();
    return response()->json($salary_edit) ;
});


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

//Product route
Route::resource("product", ProductController::class);

//Expanse route
Route::resource("expanse", ExpanseController::class);

//Expanse route
Route::resource("salary", EmployeeSalaryController::class);

Route::get('/salary-details/{id}', [EmployeeSalaryController::class, "salary_details"]);
Route::get('/api/salary-edit/{id}', [EmployeeSalaryController::class, "salary_update"]);
Route::post('/api/salary/update/{id}', [EmployeeSalaryController::class, "salaryUpdate"]);


Route::get('{any}', ApplicationController::class)->where('any', '.*');



