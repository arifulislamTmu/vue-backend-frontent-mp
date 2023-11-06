<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EmployeeSalary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return  $salary = EmployeeSalary::select('salary_month')->groupBy('salary_month')->get();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'salary_month' => "required",
            'amount' => "required",
        ]);

        $employee = EmployeeSalary::where('employee_id', $request->id)
            ->where('salary_month', $request->salary_month)
            ->first();
        if ($employee) {
            return response()->json('This salary paid');
        } else {
            $salary = new EmployeeSalary;
            $salary->employee_id = $request->id;
            $salary->amount = $request->amount;
            $salary->salary_month = $request->salary_month;
            $salary->salary_date = date('Y/m/d');
            $salary->year = date('Y');
            $salary->save();
        }
    }

    public function salary_details(string $id)
    {
        $salary_details = DB::table('employee_salaries')
                            ->join('employees', 'employee_salaries.employee_id', 'employees.id')
                            ->select('employee_salaries.*', 'employee_salaries.id as emp_salary_id','employees.*')
                            ->where('salary_month', $id)->get();
                            return $salary_details;
    }


    public function salary_update($id)
    {
        $salary_edit = DB::table('employee_salaries')
                            ->join('employees', 'employee_salaries.employee_id', 'employees.id')
                            ->select('employee_salaries.*','employees.*')
                            ->where('employee_salaries.id', $id)->first();
                            return response()->json($salary_edit) ;
    }

    public function salaryUpdate(Request $request, string $id)
    {
       $salary_update = EmployeeSalary::find($id);
       $salary_update->amount = $request->amount;
       $salary_update->salary_month = $request->salary_month;
       $salary_update->salary_date = date('Y/m/d');
       $salary_update->year = date('Y');
       $salary_update->save();
    }

    /**
     * Show the form for editing the specified resource.
     */
 

    public function destroy(string $id)
    {
        //
    }
}
