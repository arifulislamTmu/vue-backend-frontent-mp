<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class POSController extends Controller
{
    function getProductByCategory($id){
        $products = DB::table('products')
        ->join('categories','products.category_id', 'categories.id')
        ->join('suppliers','products.supplier_id', 'suppliers.id')
        ->select('categories.category_name', 'suppliers.name as sup_name', 'products.*')
        ->orderBy('products.id',"DESC")
        ->where('products.category_id', $id)
        ->get();
        return response()->json($products);

    }

    function gerProductPos(){
      return $products = Pos::latest()->get();

    }
}
