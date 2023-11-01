<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nid' => 'required',
        ]);

        $employee = new Employee;
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->nid = $request->nid;
        $employee->phone = $request->joining_date;
        $employee->address = $request->address;

        if ($request->photo) {
            $position = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $position);
            $ext = explode('/', $sub)[1];
            $name = time() . "." . $ext;
            $img = Image::make($request->photo)->resize(240, 240);
            $upload_path = "backend/employee/";
            $img_url = $upload_path . $name;
            $img->save($img_url);
            $employee->photo = $img_url;
        }

        $employee->save();
    }


   public function employee_list()  {

        $employee = Employee::latest()->get();
        return $employee;
    }

    function employee_delete($id){

    $employee = Employee::find($id);
    $photo =  $employee->photo;
      if($photo){
        unlink($photo);
        $employee->delete();
      }else{
        $employee->delete();
      }

    }

    function employee_edit($id){
        $employee = Employee::find($id);
        return response()->json($employee);
    }

    function employee_update(Request $request, $id){
        $validData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'nid' => 'required',
        ]);


        $employee =  Employee::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->nid = $request->nid;
        $employee->phone = $request->joining_date;
        $employee->address = $request->address;

        if ($request->newphoto) {
         $success =  $employee->photo;
           if($success != null){
            unlink($success);
           }
            $position = strpos($request->newphoto, ';');
            $sub = substr($request->newphoto, 0, $position);
            $ext = explode('/', $sub)[1];
            $name = time() . "." . $ext;
            $img = Image::make($request->newphoto)->resize(240, 240);
            $upload_path = "backend/employee/";
            $img_url = $upload_path . $name;
            $img->save($img_url);
            $employee->photo = $img_url;
        }

        $employee->save();
    }
}
