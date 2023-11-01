<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $supplier = Supplier::latest()->get();
         return response()->json($supplier);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $supplier = new Supplier;
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->shop_name = $request->shop_name;
        $supplier->address = $request->address;

        if ($request->photo) {
            $position = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $position);
            $ext = explode('/', $sub)[1];
            $name = time() . "." . $ext;
            $img = Image::make($request->photo)->resize(240, 240);
            $upload_path = "backend/supplier/";
            $img_url = $upload_path . $name;
            $img->save($img_url);
            $supplier->photo = $img_url;
        }

        $supplier->save();
        return response()->json($supplier);
    }

    public function show(string $id)
    {
        $supplier = Supplier::find($id);
        return response()->json($supplier);
    }




    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, string $id)
    {
        $validData = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);


        $supplier =  Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->shop_name = $request->shop_name;
        $supplier->address = $request->address;

        if ($request->new_photo) {
         $success =  $supplier->photo;
           if($success != null){
            unlink($success);
           }
            $position = strpos($request->new_photo, ';');
            $sub = substr($request->new_photo, 0, $position);
            $ext = explode('/', $sub)[1];
            $name = time() . "." . $ext;
            $img = Image::make($request->new_photo)->resize(240, 240);
            $upload_path = "backend/supplier/";
            $img_url = $upload_path . $name;
            $img->save($img_url);
            $supplier->photo = $img_url;
        }

        $supplier->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier =  Supplier::find($id);
        $photo =  $supplier->photo;
          if($photo){
            unlink($photo);
            $supplier->delete();
          }else{
            $supplier->delete();
          }
    }
}
