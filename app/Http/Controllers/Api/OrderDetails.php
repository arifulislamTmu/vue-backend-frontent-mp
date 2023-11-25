<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderDetails extends Controller
{
    function todayOrders(){
        $date = date('Y-m-d');
        $orders = DB::table('orders')
                ->join('customers','orders.customerId','customers.id')
                ->select('customers.cus_name','orders.*')
                ->orderBy('orders.id',"DESC")
                ->where('orders.order_date', $date)
                ->paginate(2);
                return response()->json($orders);
    }

    function allOrders() {
        $orders = DB::table('orders')
        ->join('customers','orders.customerId','customers.id')
        ->select('customers.cus_name','orders.*')
        ->orderBy('orders.id',"DESC")
        ->get();
        return response()->json($orders);
    }
    function OrdersDetails($id) {
        $orders = DB::table('orders')
        ->join('customers','orders.customerId','customers.id')
        ->join('order_details','orders.id','order_details.orderId')
        ->select('customers.cus_name','orders.*','order_details.*')
        ->orderBy('orders.id',"DESC")
        ->where('orders.id', $id)
        ->get();
        return response()->json($orders);
    }
    function OrdersCustomerDetails($id) {
        $orders = DB::table('orders')
        ->join('customers','orders.customerId','customers.id')
        ->select('customers.*','orders.*')
        ->orderBy('orders.id',"DESC")
        ->where('orders.id', $id)
        ->first();
        return response()->json($orders);
    }

}
